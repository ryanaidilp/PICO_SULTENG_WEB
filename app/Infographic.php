<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(InfographicImage::class, 'id_infographic', 'id');
    }
}
