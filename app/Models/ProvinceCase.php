<?php

namespace App\Models;

use App\Models\Province;
use App\Models\NationalCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvinceCase extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = [
        "death_ratio",
        "under_treatment",
        "cumulative_under_treatment"
    ];

    /**
     * Get the province that owns the ProvinceCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, "province_id", "id");
    }

    /**
     * Get the national_case that owns the ProvinceCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_case(): BelongsTo
    {
        return $this->belongsTo(NationalCase::class, "day", "id");
    }

    // Accessors & Mutators 
    public function getDeathRatioAttribute()
    {
        return ($this->positive > 0) ?
            percentageValue($this->positive, $this->deceased) : 0;
    }

    public function getUnderTreatmentAttribute()
    {
        return $this->positive - ($this->recovered + $this->deceased);
    }

    public function getCumulativeUnderTreatmentAttribute()
    {
        return $this->cumulative_positive - ($this->cumulative_recovered + $this->cumulative_deceased);
    }
}
