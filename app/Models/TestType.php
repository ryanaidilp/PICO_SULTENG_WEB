<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestType extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships

    /**
     * Get all of the province_test_cases for the TestType.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_test_cases(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, 'test_type_id', 'id');
    }

    public function province_test_case()
    {
        return $this->hasOne(ProvinceTest::class, 'test_type_id', 'id')->latest('day');
    }

    // Methods

    // Mutators & Accessors
}
