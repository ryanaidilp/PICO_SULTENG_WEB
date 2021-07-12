<?php

namespace App\Models;

use App\Models\ProvinceTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestType extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    /**
     * Get all of the province_test_cases for the TestType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_test_cases(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, "test_type_id", "id");
    }

    // Methods

    // Mutators & Accessors
}
