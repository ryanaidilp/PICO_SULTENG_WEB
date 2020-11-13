<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'rumah_sakit';
    protected $casts = [
        'no' => 'integer',
    ];

    protected $primaryKey = 'no';
}
