<?php

namespace App\Models;

use App\Models\Phone;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $table = "posko";

    public function phones()
    {
        return $this->hasMany(Phone::class, 'id_posko', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kode_kabupaten', 'no');
    }
}
