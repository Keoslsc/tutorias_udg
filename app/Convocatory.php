<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Convocatory extends Model
{
    protected $table = "convocatories";

    public static function showActive()
    {
        $now = Carbon::now()->format('Y-m-d');
        $checkConvocatory = Convocatory::where('end', ">", $now)->first();
        return $checkConvocatory;
    }

    //Users
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

}
