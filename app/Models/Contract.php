<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'code',
        'administrator_id',
        'contract_type',
        'payment_method_id',
        'benefit_plan_id',
        'start_date',
        'end_date',
        'policy',
        'price',
        'price_list_id',
        'variation'
    ];

    public function contract($contract_type){
        
        if($contract_type){

            return $this->where($contract_type,'like',"%$contract_type%");
        }
    }
     public function administrator($type){
        return $this->belongsTo(Administrator::class);
        if($type){

            return $this->where($type,'like',"%$type%");
        }
    }

    public function payment_method($id){
        return $this->belongsTo(PaymentMethod::class);
        if($id){
            return $this->where($id,'like',"%$id%");
        }
    }

    public function benefitsPlan($id){
        return $this->belongsTo(BenefitsPlan::class);
        if($id){
            return $this->where($id,'like',"%$id%");
        }
    }

    public function priceList($id){
        return $this->belongsTo(PriceList::class);
        if($id){
            return $this->where($id,'like',"%$id%");
        }
    }
}
