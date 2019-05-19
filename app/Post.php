<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id', 'body', 'description', 'user_id', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }    
}
