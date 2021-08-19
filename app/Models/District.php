<?php

namespace App\Models;

use App\Models\Regency;
use App\Models\Village;
use App\Models\DistrictCase;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory, HasEagerLimit;

    protected $guarded = [];
    public $incrementing = false;

    // Relationships
    /**
     * Get the regency that owns the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, "regency_id", "id");
    }

    /**
     * Get all of the villages for the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'district_id', 'id');
    }

    /**
     * Get all of the cases for the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(DistrictCase::class, "district_id", "id");
    }

    /**
     * Get the case associated with the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function case(): HasOne
    {
        return $this->hasOne(DistrictCase::class, 'district_id', 'id')->latest("day")->limit(1);
    }

    // Methods

    // Mutators & Accessors
}
