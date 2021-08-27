<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'notes'

    ];

    public function priceList(){

        return $this->hasMany(PriceList::class);
    }

    public function tecnicNoteCup(){
        return $this->hasMany(TecnicNoteCup::class);
    }
}
