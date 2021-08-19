<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NationalCase extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = [
        'death_ratio',
        'under_treatment',
        'cumulative_under_treatment',
    ];

    /**
     * Get all of the province_cases for the NationalCase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_cases(): HasMany
    {
        return $this->hasMany(ProvinceCase::class, 'day', 'id');
    }

    /**
     * Get all of the regency_cases for the NationalCase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regency_cases(): HasMany
    {
        return $this->hasMany(RegencyCase::class, 'day', 'id');
    }

    /**
     * Get all of the province_gender_cases for the NationalCase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_gender_cases(): HasMany
    {
        return $this->hasMany(ProvinceGenderCase::class, 'day', 'id');
    }

    /**
     * Get all of the tests for the NationalCase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, 'day', 'id');
    }

    //  Mutators & Accessors
    public function getDeathRatioAttribute()
    {
        return ($this->cumulative_positive > 0) ?
            percentageValue($this->cumulative_positive, $this->cumulative_deceased) : 0;
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
