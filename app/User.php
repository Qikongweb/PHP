<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','created_by','last_modified_by','deleted_at','deleted_by'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    // relationship with theme
    public function themeCreate()
    {
        return $this->hasMany('App\Theme','created_by');
    }

    public function themeModify()
    {
        return $this->hasMany('App\Theme','last_modified_by');
    }

    // relationship with post
    public function postCreate()
    {
        return $this->hasMany('App\Post','created_by');
    }

    public function postModify()
    {
        return $this->hasMany('App\Post','last_modified_by');
    }

    public function postDelete()
    {
        return $this->hasMany('App\Post','deleted_by');
    }

    //relationship useritself
    public function userItselfCreate()
    {
        return $this->hasMany('App\User','created_by');
    }

    public function userItselfModify()
    {
        return $this->hasMany('App\User','last_modified_by');
    }

    public function userItselftDelete()
    {
        return $this->hasMany('App\User','deleted_by');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','user_id');
    }

    // set the checkbox
    public function is($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
    }

    // check it is admin
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    // check it has many role
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    // check it has one role
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }


}
