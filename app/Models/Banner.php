<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
