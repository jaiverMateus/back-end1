<?php

namespace App\Http\Controllers;

use App\Models\price_list;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return price_list::all();
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
            price_list::create($request->all());
            return response()->json('Lista de precios creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function show(price_list $price_list)
    {
        $price_list = price_list::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function edit(price_list $price_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $price_list = price_list::findOrFail($id);
            $price_list->cup_id = $request->cup_id;
            $price_list->cum = $request->cum;
            $price_list->price = $request->price;
            $price_list->save();
            return response()->json('Lista de precios actualizada correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\price_list  $price_list
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $price_list = price_list::findOrFail($id);
            $price_list->delete();
            return response()->json('Lista de precios eliminada correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
