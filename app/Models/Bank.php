<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships

    /**
     * Get all of the bank_accounts for the Bank.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bank_accounts(): HasMany
    {
        return $this->hasMany(BankAccount::class, 'bank_id', 'id');
    }

    // Methods

    // Mutators & Accessors
}
