<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = [];

    public function stat()
    {
        return $this->belongsTo(Stats::class, 'day', 'id');
    }
}
