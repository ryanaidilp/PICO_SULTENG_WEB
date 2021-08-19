<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvinceVaccine extends Model
{
    use HasFactory, HasEagerLimit;

    protected $guarded = [];

    // Relationships

    /**
     * Get the national_vaccine that owns the ProvinceVaccine.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_vaccine(): BelongsTo
    {
        return $this->belongsTo(NationalVaccine::class, 'day', 'id');
    }

    /**
     * Get the province that owns the ProvinceVaccine.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
