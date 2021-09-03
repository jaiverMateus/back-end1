<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimenAndLevel extends Model
{
    use HasFactory;

    protected $fillable=[
        'regimen_id',
        'level_id'
    ];
}
