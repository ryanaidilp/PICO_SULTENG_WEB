<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'accountable');
    }

    // Methods

    // Mutators & Accessors
}
