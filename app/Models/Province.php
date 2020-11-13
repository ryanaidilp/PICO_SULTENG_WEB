<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $hidden = ['created_at'];
    protected $table = 'provinsi';
    protected $guarded = [];
    protected $casts = [
        'kode_provinsi' => 'integer',
        'positif' => 'integer',
        'sembuh' => 'integer',
        'meninggal' => 'integer',
    ];
    protected $appends = [
        'dalam_perawatan',
        'rasio_kematian',
    ];

    protected $primaryKey = 'kode_provinsi';
    public $incrementing = false;

    public function getDalamPerawatanAttribute()
    {
        return $this->positif - ($this->sembuh + $this->meninggal);
    }

    public function getRasioKematianAttribute()
    {
        return ($this->positif > 0) ? round(($this->meninggal / $this->positif) * 100, 2) : 0;
    }
}
