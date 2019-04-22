<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'id', 'description', 'status', 'created_at', 'updated_at'
    ];

    public function careers()
    {
        return $this->hasMany('App\Career');
    }

    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
