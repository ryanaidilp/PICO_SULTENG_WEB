<?php

namespace App\Models;

use App\Models\Hospital;
use App\Models\Province;
use App\Models\TaskForce;
use App\Models\RegencyCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regency extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = false;

    /**
     * Get the province that owns the Regency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, "province_id", "id");
    }

    /**
     * Get all of the cases for the Regency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(RegencyCase::class, "regency_id", "id");
    }

    /**
     * Get all of the task_forces for the Regency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task_forces(): HasMany
    {
        return $this->hasMany(TaskForce::class, "regency_id", "id");
    }

    /**
     * Get all of the hospitals for the Regency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospitals(): HasMany
    {
        return $this->hasMany(Hospital::class, "regency_id", "id");
    }
}
