<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tecnic_note extends Model
{
    use HasFactory;
    protected $fillable=[
           'frequency',
           'alert_percentage',
           'unit_value',
           'date',
           'chance'
    ];
}
