<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'id', 'name', 'description', 'user_id', 'module_id', 'created_at'
=======
        'id', 'name', 'description', 'user_id', 'module_id', 'created_at'
>>>>>>> master
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
<<<<<<< HEAD
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }    
=======
    public function files()
    {
        return $this->morphMany('App\File', 'foreign');
    }
>>>>>>> master
}
