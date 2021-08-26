<?php

namespace App\Http\Controllers;

use App\Models\payment_method;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return payment_method::all();
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
            payment_method::create($request->all());
            return response()->json('Modalidad de pago creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function show(payment_method $payment_method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function edit(payment_method $payment_method)
    {
        $payment_method = payment_method::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $payment_method = payment_method::findOrFail($id);
            $payment_method->name = $request->name;
            $payment_method->description = $request->description;
            
            $payment_method->save();
            return response()->json('Modalidad de pago actualizada correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $payment_method = payment_method::findOrFail($id);
            $payment_method->delete();
            return response()->json('Modalida de pago eliminada correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
