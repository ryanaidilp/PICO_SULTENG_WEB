<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvinceTest extends Model
{
    use HasFactory, HasEagerLimit;

    protected $guarded = [];
    protected $appends = ['total'];

    const PCR = 1;
    const RDT = 2;
    const TCM = 3;
    const RDT_AB = 4;
    const RDT_AG = 5;

    // Relationships

    /**
     * Get the test_type that owns the ProvinceTest.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test_type(): BelongsTo
    {
        return $this->belongsTo(TestType::class, 'test_type_id', 'id');
    }

    /**
     * Get the province that owns the ProvinceTest.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Get the national_case that owns the ProvinceCase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function national_case(): BelongsTo
    {
        return $this->belongsTo(NationalCase::class, 'day', 'id');
    }

    // Methods

    // Mutators & Accessors
    public function getTotalAttribute()
    {
        return $this->process + $this->invalid + $this->positive + $this->negative;
    }
}
