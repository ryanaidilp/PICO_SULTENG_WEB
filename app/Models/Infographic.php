<?php

namespace App\Models;

use App\Models\InfographicImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Infographic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(InfographicImage::class, 'id_infographic', 'id');
    }
}
