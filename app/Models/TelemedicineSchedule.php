<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TelemedicineSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships

    /**
     * Get the telemedicine that owns the TelemedicineSchedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telemedicine(): BelongsTo
    {
        return $this->belongsTo(Telemedicine::class, 'telemedicine_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
