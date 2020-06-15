<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfographicImage extends Model
{
    protected $guarded = [];
    public function infographic()
    {
        return $this->belongsTo(Infographic::class, 'id_infographic', 'id');
    }
}
