<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalCaseHistory extends Model
{
    protected $guarded = [];
    protected $hidden = ['updated_at', 'created_at'];
    protected $appends = ['under_treatment'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'no');
    }

    public function stat()
    {
        return $this->belongsTo(Stat::class, 'day', 'id');
    }

    public function getUnderTreatmentAttribute()
    {
        return ($this->positive > 0) ? $this->positive - ($this->recovered + $this->death) : 0;
    }
}
