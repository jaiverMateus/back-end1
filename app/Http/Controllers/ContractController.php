<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Administrator;
use App\Models\PaymentMethod;
use App\Models\BenefitsPlan;
use App\Models\PriceList;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = Contract::when(Request()->get('location_id'), function ($q, $id) {
            //$q->where('location_id', '=', $id);
        })->get(['contract_name As text', 'id As value']);

        return $this->success($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Contract::create($request->all());
            return response()->json('recurso creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */

     public function getAdministratorType(Request $request,$type){

        try{
            return Administrator::with('contracts')->Where('type',$type)->get();
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);}

     }

     public function getPaymentMethod($id){
        try{
            
            return PaymentMethod::with('contracts')->Where('id',$id)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }


     }

     public function getBenefitsPlan($id){
        try{
            
            return BenefitsPlan::with('contracts')->Where('id',$id)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }

     }

     public function getPriceList($id){
        try{
            
            return PriceList::with('contracts')->Where('id',$id)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }

     }

     public function getContractType($contract_type){
        try{
            
            return Contract::Where('contract_type',$contract_type)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }

     }

    public function show(Request $request,$type)
    {
        

            // $type = $request->get('type');
            // dd($type);
                
                
                // with('administrator')->find("ARL");
                  
        /*try{
            $contract = Contract::findOrFail($id);
            //return response()->json( $contract);
            return Contract::with('administrator','payment_method','benefitsPlan','priceList')->find(7);
            //return Contract::whit('payment_method')->find(3);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{

       
       $contract = Contract::findOrFail($id);
       $contract->name = $request->name;
       $contract->number = $request->number;
       $contract->code=$request->code;
       $contract->administrator_id = $request->administrator_id;
       $contract->contract_type=$request->contract_type;
       $contract->payment_method_id=$request->payment_method_id;
       $contract->benefits_plan_id=$request->benefit_plan_id;
       $contract->start_date = $request->start_date;
       $contract->end_date=$request->end_date;
       $contract->policy = $request->policy;
       $contract->price=$request->price;
       $contract->price_list_id=$request->price_list_id;
       $contract->variation=$request->variation;
       $contract->save();
       return response()->json('contrato actualizado correctamente');
       
    }catch(\Throwable $th){
        return response()->json([$th->getMessage(), $th->getLine()]);
    }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            $contract = Contract::findOrFail($id);
            $contract->delete();
            return response()->json('contrato eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
        
    }
}
