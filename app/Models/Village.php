<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory, HasEagerLimit;

    protected $guarded = [];
    public $incrementing = false;

    // Relationships

    /**
     * Get the district that owns the Village.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    /**
     * Get all of the cases for the Village.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(VillageCase::class, 'village_id', 'id');
    }

    /**
     * Get the case associated with the Village.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function case(): HasOne
    {
        return $this->hasOne(VillageCase::class, 'village_id', 'id')->latest('day')->limit(1);
    }

    // Methods

    // Mutators & Accessors
}
