<?php

namespace App\Models;

use App\Models\District;
use App\Models\Statistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocalCaseHistory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['updated_at', 'created_at'];
    protected $appends = ['under_treatment'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'no');
    }

    public function stat()
    {
        return $this->belongsTo(Statistic::class, 'day', 'id');
    }

    public function getUnderTreatmentAttribute()
    {
        return ($this->positive > 0) ? $this->positive - ($this->recovered + $this->death) : 0;
    }
}
