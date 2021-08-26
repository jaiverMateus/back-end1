<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tecnic_note_cup extends Model
{
    use HasFactory;

    protected $fillable=[
      'cup_id',
      'tecnic_note_id'

    ];
}
