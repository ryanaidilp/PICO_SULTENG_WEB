<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfographicImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships

    /**
     * Get the infographic that owns the InfographicImage.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function infographic(): BelongsTo
    {
        return $this->belongsTo(Infographic::class, 'infographic_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
