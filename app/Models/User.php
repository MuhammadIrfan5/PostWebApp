<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\RegisterController;
use App\Notifications\UserRegistered;
use App\Models\Posts;
use App\Models\likes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $primaryKey='id';
    
    protected $fillable = [
        'name',
        'username',
        'email',
        'usertype',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function likes()
    {
       return $this->hasMany(likes::class);
    }

   /* public static function boot()
    {
        parent::boot();
        static::created(function ($model){
            $user = User::first();
            $admin = User::all()->filter(function ($user) {
                return $user->usertype = 'admin';
            });
            //$admin= User::where('usertype', 'admin')->get();
            Notification::send($admin, new UserRegistered($model));
            //$user = User::notify(new UserRegistered());
        });
    }
*/


}
