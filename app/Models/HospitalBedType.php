<?php

namespace App\Models;

use App\Models\HospitalBed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HospitalBedType extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    /**
     * Get all of the hospital_beds for the HospitalBedType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospital_beds(): HasMany
    {
        return $this->hasMany(HospitalBed::class, "hospital_bed_type_id", "id");
    }

    // Methods

    // Mutators & Accessors
}
