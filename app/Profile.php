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

    public function aveg(){  
        $posts = Post::where('user_id',$this->user_id)->select('id');
        $ratings = \willvincent\Rateable\Rating::whereIn('rateable_id',$posts)->select('rating');  
        return $ratings->avg('rating');
        
    }
    public function suma(){  
        $posts = Post::where('user_id',$this->user_id)->select('id');
        $ratings = \willvincent\Rateable\Rating::whereIn('rateable_id',$posts)->select('rating');  
        return $ratings->sum('rating');
        
    }
}
