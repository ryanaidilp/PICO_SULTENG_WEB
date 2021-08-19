<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HospitalBed extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships

    /**
     * Get the bed_type that owns the HospitalBed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bed_type(): BelongsTo
    {
        return $this->belongsTo(HospitalBedType::class, 'hospital_bed_type_id', 'id');
    }

    /**
     * Get the hospital that owns the HospitalBed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
