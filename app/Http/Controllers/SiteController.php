<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $model = new User();
        if ($request->isMethod('post'))
        {
            $request->validate([
                'profile_name' => 'required',
                'profile_image' => 'required|image|mimes:png,jpg',
                'email' => 'required|email|unique:users,email',
                'pan' => 'required',
                'aadhar' => 'required|numeric'
            ]);

            if(!empty($request->file('profile_image'))){
                $fileName = 'profile-'.time(). '-user.' .  $request->file('profile_image')->getClientOriginalExtension();
                $request->file('profile_image')->storeAs('public/uploads/profiles/', $fileName);
            }

            $model = new User();
            $model->profile_name = $request->profile_name;
            $model->profile_image = $fileName ?? '';
            $model->email = $request->email;
            $model->address = $request->address ?? null;
            $model->pan = $request->pan;
            $model->aadhar = $request->aadhar;
            $model->role = User::ROLE_USER;
            $model->password = \Hash::make('User!123');
            if(!$model->save()){
                return redirect()->back()->with('error', 'There was an error...');
            }
            return redirect()->back()->with('success', 'Record submitted successfully');
        }
        return view('site.index')->with(['model' => $model]);
    }



    public function login(Request $request)
    {
        $model = new User();
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if(Auth::attempt($request->only('email','password'))){
                return redirect()->route('dashboard.index');
            }
            return redirect('/login')->withErrors(['email' => 'Email or Password is incorrect.']);
        }
        return view('site.login')->with(['model' => $model]);
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect()->route('index');
    }

}
