<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regime_tecnic_note extends Model
{
    use HasFactory;

    protected $fillable=[
        'regime_id',
        'tecnic_note_id'

    ];
}
