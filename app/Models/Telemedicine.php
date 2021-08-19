<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telemedicine extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    /**
     * Get all of the schedules for the Telemedicine.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(TelemedicineSchedule::class, 'telemedicine_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
