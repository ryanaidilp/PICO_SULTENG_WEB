<?php

namespace App\Models;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stat()
    {
        return $this->belongsTo(Statistic::class, 'day', 'id');
    }
}
