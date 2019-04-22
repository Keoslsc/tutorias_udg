<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'date', 'about_me', 'cellphone', 'career_id', 'G', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function career()
    {
        return $this->belongsTo('App\Career');
    }
}
