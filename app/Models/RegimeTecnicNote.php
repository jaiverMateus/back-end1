<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimeTecnicNote extends Model
{
    use HasFactory;

    protected $fillable=[
        'regime_id',
        'tecnic_note_id'

    ];

    public function regime(){
        return $this->belongsTo(Regime::class);
    }

    public function tecnic_note(){
        return $this->belongsTo(TecnicNote::class);
    }
}
