<?php

namespace App\Models;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phone';

    protected $primaryKey = 'phone';

    public $incrementing = false;

    protected $keyType = 'string';

    public function posko()
    {
        return $this->belongsTo(Facility::class, 'id_posko');
    }
}
