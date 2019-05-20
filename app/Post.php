<?php

namespace App;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use Rateable;

    protected $fillable = [
        'id', 'name', 'description', 'user_id', 'module_id', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    } 
    
    public function files()
    {
        return $this->morphMany('App\File', 'foreign');
    } 
}
