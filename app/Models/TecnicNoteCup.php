<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TecnicNoteCup extends Model
{
    use HasFactory;

    protected $fillable=[
      'cup_id',
      'tecnic_note_id'

    ];

    public function tecnic_note(){
      return $this->belongsTo(TecnicNote::class);
    }

    public function cup(){
      return $this->belongsTo(Cup::class);
    }
}
