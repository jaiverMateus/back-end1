<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'type'
        
    ];

     public function contracts(){

        return $this->hasMany(Contract::class);

        // if($type){

        //     return $this->Where($type,'like',"%$type%");
        // }
    }
}
