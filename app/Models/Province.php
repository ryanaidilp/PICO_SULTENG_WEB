<?php

namespace App\Models;

use App\Models\Regency;
use App\Models\Hospital;
use App\Models\TaskForce;
use App\Models\ProvinceCase;
use App\Models\ProvinceTest;
use App\Models\ProvinceGenderCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = false;

    /**
     * Get all of the regencies for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class, "province_id", "id");
    }

    /**
     * Get all of the cases for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(ProvinceCase::class, "province_id", "id");
    }

    /**
     * Get all of the tests for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, "province_id", "id");
    }

    /**
     * Get all of the hospitals for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function hospitals(): HasManyThrough
    {
        return $this->hasManyThrough(
            Hospital::class,
            Regency::class,
            "province_id",
            "regency_id",
            "id",
            "id"
        );
    }

    /**
     * Get all of the task_forces for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function task_forces(): HasManyThrough
    {
        return $this->hasManyThrough(
            TaskForce::class,
            Regency::class,
            "province_id",
            "regency_id",
            "id",
            "id"
        );
    }

    /**
     * Get all of the gender_cases for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gender_cases(): HasMany
    {
        return $this->hasMany(ProvinceGenderCase::class, "province_id", "id");
    }
}
