<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskForce extends Model
{
    use HasFactory;

    const EMAIL = 1;
    const TELEPHONE = 2;
    const FAX = 3;

    protected $guarded = [];

    /**
     * Get the regency that owns the TaskForce.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    /**
     * Get all of the contacts for the TaskForce.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
