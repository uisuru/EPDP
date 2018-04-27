<?php

namespace App;

use App\Notifications\resetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name','lName', 'email','contact_no', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new resetPassword($token));
    }

    public function authorRole()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public static function findByUsername($user)
    {
        return static::where('username', $user)->first();
    }

    public static function isAdmin(){
        $roleInformation = Voyager::model('Role')::where('id', \Auth::user()->role_id)->first();
        return ($roleInformation->name=="admin")?true:false;
    }
    public static function isLecturer(){
        $roleInformation = Voyager::model('Role')::where('id', \Auth::user()->role_id)->first();
        return ($roleInformation->name=="lecturer")?true:false;
    }
    public static function isAdminById($id){
        $roleInformation = Voyager::model('Role')::where('id', \Auth::user()->role_id)->first();
        return ($roleInformation->name=="admin")?true:false;
    }
    public static function isLecturerById($id){
    $roleInformation = Voyager::model('Role')::where('id', \Auth::user()->role_id)->first();
    return ($roleInformation->name=="lecturer")?true:false;
    }
    public function verified()
    {
        return $this->token===null;
    }
    public function sendVerificationEmail()
    {
        $this -> notify(new VerifyEmail($this));
    }
}
