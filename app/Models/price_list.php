<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_list extends Model
{
    use HasFactory;

    protected $fillable=[
        'cup_id',
        'cum',
        'price'



    ];




    
}
