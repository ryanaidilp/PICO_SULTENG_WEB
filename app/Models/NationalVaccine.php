<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NationalVaccine extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'date' => 'datetime',
    ];

    // Relationships

    /**
     * Get all of the province_vaccines for the NationalVaccine.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_vaccines(): HasMany
    {
        return $this->hasMany(ProvinceVaccine::class, 'day', 'id');
    }

    // Methods

    // Mutators & Accessors
}
