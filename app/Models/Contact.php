<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    const EMAIL = 1;
    const TELEPHONE = 2;
    const FAKS = 3;
    const WEBSITE = 4;

    protected $guarded = [];

    public function contactable()
    {
        return $this->morphTo();
    }

    /**
     * Get the contact_type that owns the Contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact_type(): BelongsTo
    {
        return $this->belongsTo(ContactType::class, 'contact_type_id', 'id');
    }
}
