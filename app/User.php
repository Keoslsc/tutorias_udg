<?php

namespace App;

use App\Role;
use QCod\ImageUp\HasImageUploads;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasImageUploads;


    protected static $imageFields = [
        'avatar' => [
            // width to resize image after upload
            'width' => 200,
            
            // height to resize image after upload
            'height' => 200,
            
            // set true to crop image with the given width/height and you can also pass arr [x,y] coordinate for crop.
            'crop' => true,
            
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'public',
            
            // a folder path on the above disk, default config('imageup.upload_directory')
            'path' => 'avatars',
            
            // placeholder image if image field is empty
            'placeholder' => 'public/user.png',
        ]
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'status'
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

    //Roles    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) 
        {
            return true;
        }
        abort(401, 'This action is not authorized.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) 
        {
            foreach ($roles as $role) 
            {
                if ($this->hasRole($role)) 
                {
                    return true;
                }
            }
        } 
        else 
        {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) 
        {
            return true;
        }
        return false;
    }

    //Convocatories
    public function convocatories()
    {
        return $this->belongsToMany('App\Convocatory')->withTimestamps();
    }

    //Profile
    public function profile()
    {
        return $this->HasOne('App\Profile');
    }

    //Modules
    public function modules()
    {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }

    //Posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //Files
    public function files()
    {
        return $this->morphMany('App\File', 'modelo');
    }

    
}
