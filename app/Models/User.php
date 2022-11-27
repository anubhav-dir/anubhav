<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 1;

    const ROLE_USER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole()
    {
        $list = [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_USER => 'User'
        ];

        return $list[$this->role] ?? 'Not Define';
    }

    public function getProfileImage()
    {
        if(!empty($this->profile_image))
        {
            $profile = public_path('storage/uploads/profiles/' . $this->profile_image);
            if(file_exists($profile)){
                return url('/storage/uploads/profiles/' . $this->profile_image);;
            }
        }
        return url('/storage/theme/images/avatar.jpg');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-M-d h:m:s a', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('Y-M-d h:m:s a', strtotime($value));
    }

    public static function isAdmin()
    {
        if(\Auth::check()){
            if(Auth::user()->role == self::ROLE_ADMIN){
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isUser()
    {
        if(\Auth::check()){
            if(Auth::user()->role == self::ROLE_USER){
                return true;
            }
            return false;
        }
        return false;
    }

}
