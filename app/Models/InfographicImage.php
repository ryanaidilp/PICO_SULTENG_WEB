<?php

namespace App\Models;

use App\Models\Infographic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfographicImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function infographic()
    {
        return $this->belongsTo(Infographic::class, 'id_infographic', 'id');
    }
}
