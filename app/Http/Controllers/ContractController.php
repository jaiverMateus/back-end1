<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Administrator;
use App\Models\PaymentMethod;
use App\Models\BenefitsPlan;
use App\Models\PriceList;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract = Contract::query();

        $contract->when(request()->get('department_id'), function (Builder $q) {
            $q->where('department_id', request()->get('department_id'));
        });

        $contract->when(request()->get('eps_id'), function (Builder $q) {
            $q->where(function (Builder $q) {
                $q->where('administrator_id', request()->get('eps_id'))
                    ->orWhere('regimen_id', request()->get('regimen_id'));
            });
        });

        $contract->when(request()->get('company_id'), function (Builder $q) {
            $q->where('company_id', request()->get('company_id'));
        });


        $result = $contract->get(['name As text', 'id As value']);

        return $this->success($result);
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
        $contract = Contract::findOrFail($id);
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
       $contract->code=$reques->code;
       $contract->administrator_id = $request->administrator_id;
       $contract->contract_type=$request->contract_type;
       $contract->payment_method_id=$request->payment_method_id;
       $contract->benefit_plan_id=$request->benefit_plan_id;
       $contract->start_date = $request->start_date;
       $contract->end_date=$reques->end_date;
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
