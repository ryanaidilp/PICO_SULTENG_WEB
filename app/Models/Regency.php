<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regency extends Model
{
    use HasFactory, HasEagerLimit;

    protected $guarded = [];
    public $incrementing = false;

    /**
     * Get the province that owns the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Get all of the districts for the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'regency_id', 'id');
    }

    /**
     * Get all of the cases for the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(RegencyCase::class, 'regency_id', 'id');
    }

    /**
     * Get the case associated with the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function case(): HasOne
    {
        return $this->hasOne(RegencyCase::class, 'regency_id', 'id')->latest('day')->limit(1);
    }

    /**
     * Get all of the task_forces for the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task_forces(): HasMany
    {
        return $this->hasMany(TaskForce::class, 'regency_id', 'id');
    }

    /**
     * Get all of the hospitals for the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospitals(): HasMany
    {
        return $this->hasMany(Hospital::class, 'regency_id', 'id');
    }

    /**
     * Get all of the vaccine_locations for the Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vaccine_locations(): HasMany
    {
        return $this->hasMany(VaccineLocation::class, 'regency_id', 'id');
    }
}
