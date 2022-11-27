<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function index()
    {
        $model = User::where(['role' => User::ROLE_USER])->orderBy('id','DESC')->paginate(10);
        return view('user.index')->with(['model' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->findModel($id);
        return view('user.show')->with(['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->findModel($id);
        return view('user.update')->with(['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->findModel($id);
        $request->validate([
            'profile_name' => 'required',
            'profile_image' => 'image|mimes:png,jpg',
            'email' => "required|email|unique:users,email,{$model->id}",
            'pan' => 'required',
            'aadhar' => 'required|numeric'
        ]);

        $fileName = $model->profile_image;
        if(!empty($request->file('profile_image'))){
            $image_path = public_path('storage/uploads/profiles/' . $fileName);
            $fileName = 'profile-'.time(). '-user.' .  $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->storeAs('public/uploads/profiles/', $fileName);
            if (\File::exists($image_path)) {
                \File::delete($image_path);
            }
        }

        $model->profile_name = $request->profile_name;
        $model->profile_image = $fileName ?? '';
        $model->email = $request->email;
        $model->address = $request->address;
        $model->pan = $request->pan;
        $model->aadhar = $request->aadhar;
        if(!$model->save()){
            return redirect()->back()->with('error', 'There was an error...');
        }
        return redirect()->route('user.show', ['user' => $model->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $model = Auth::user();
        return view('user.profile')->with(['model' => $model]);
    }

    public function profileupdate(Request $request)
    {
        $model = Auth::user();
        if ($request->isMethod('post'))
        {
            $request->validate([
                'profile_name' => 'required',
                'profile_image' => 'image|mimes:png,jpg',
                'email' => "required|email|unique:users,email,{$model->id}",
                'pan' => 'required',
                'aadhar' => 'required|numeric'
            ]);

            $fileName = $model->profile_image;
            if(!empty($request->file('profile_image')))
            {
                $image_path = public_path('storage/uploads/profiles/' . $fileName);
                $fileName = 'profile-'.time(). '-user.' .  $request->file('profile_image')->getClientOriginalExtension();
                $request->file('profile_image')->storeAs('public/uploads/profiles/', $fileName);
                if (\File::exists($image_path)) {
                    \File::delete($image_path);
                }
            }

            $model->profile_name = $request->profile_name;
            $model->profile_image = $fileName ?? '';
            $model->email = $request->email;
            $model->address = $request->address;
            $model->pan = $request->pan;
            $model->aadhar = $request->aadhar;
            if(!$model->save()){
                return redirect()->back()->with('error', 'There was an error...');
            }
            return redirect()->route('user.profile');
        }
        return view('user.profile-update')->with(['model' => $model]);

    }

    public function addAdmin()
    {
        $admin = User::where(['role' => User::ROLE_ADMIN])->count();
        if(empty($admin))
        {
            $model = new User();
            $model->profile_name = 'Admin';
            $model->profile_image = '';
            $model->email = 'admin@gmail.com';
            $model->address = '';
            $model->pan = 'AC12DF2022';
            $model->aadhar = '987654321123';
            $model->role = User::ROLE_ADMIN;
            $model->password = \Hash::make('admin@123');
            if(!$model->save()){
                return redirect()->back()->with('error', 'There was an error...');
            }
        }
        return view('user.add-admin');
    }

    protected function findModel($id)
    {
        $model = User::find($id);
        if(!empty($model)){
            if(User::isAdmin() || $model->id == Auth::user()->id){
                return $model;
            }
            abort(403, 'You are not allowed to perform this action.');
        }
        abort(404);
    }
}
