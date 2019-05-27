<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDelete;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'id', 'name', 'division_id', 'status', 'created_at', 'updated_at'
    ];
    public function getNameAttribute($value){
        return ucwords($value);
    }
    protected $dates = ['deleted_at'];
    //Division
    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    //Users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    //Files
    public function files()
    {
        return $this->morphMany('App\File', 'foreign');
    }

    //Posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
