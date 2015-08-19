<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */

    public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','lastname', 'email' , 'password', 'telephone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    
    public static $rules= array(
            'firstname' => 'required|min:2|alpha',
            'lastname'  => 'required|min:2|alpha',
            'email'     =>  'required|email|unique:user',
            'password'  =>  'required|alpha_num|between:8,12|confirmed',
            'password_confirmation' => 'required|alpha_num|between:8,12',
            'telephone' => 'required|min:11|max:11',
            'admin'     =>  'integer'
        );

    public static $login = array(
            'email'    => 'required|email',
            'password' => 'required|between:8,12|alpha_num'
        );
}
