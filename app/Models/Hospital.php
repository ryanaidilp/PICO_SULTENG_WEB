<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Regency;
use App\Models\HospitalBed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;

    const EMAIL = 1;
    const TELEPHONE = 2;
    const FAX = 3;

    protected $guarded = [];

    public function contacts()
    {
        return $this->morphMany(Contact::class, "contactable")->orderBy("contact_type_id");
    }

    /**
     * Get the regency that owns the Hospital
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, "regency_id", "id");
    }

    /**
     * Get all of the beds for the Hospital
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beds(): HasMany
    {
        return $this->hasMany(HospitalBed::class, "hospital_id", "id")->orderBy("hospital_bed_type_id");
    }
}
