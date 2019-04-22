<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'id', 'name', 'division_id', 'status', 'created_at', 'updated_at'
    ];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}
