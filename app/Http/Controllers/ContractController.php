<?php

namespace App\Http\Controllers;

use App\Models\Contract;
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
       return Contract::all();
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
    public function show($id)
    {
        try{
            $contract = Contract::findOrFail($id);
            //return response()->json( $contract);
            return Contract::with('administrator')->find(4);
            return Contract::whit('payment_method')->find(1);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
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
