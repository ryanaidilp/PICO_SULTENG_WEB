<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalCaseHistory extends Model
{
    use HasFactory;
    protected $table = 'national_case_histories';
    protected $casts = [
        'cumulative_positive' => 'integer',
        'cumulative_recovered' => 'integer',
        'cumulative_deceased' => 'integer',
        'daily_positive_case' => 'integer',
        'daily_recovered_case' => 'integer',
        'daily_deceased_case' => 'integer',
    ];
    protected $primaryKey = 'day';
}
