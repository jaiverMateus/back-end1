<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
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
        return PriceList::all();
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
            PriceList::create($request->all());
            return response()->json('Lista de precios creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceList  $PriceList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        try{
            $PriceList = PriceList::findOrFail($id);
            // return response()->json( $administrator);
            return PriceList::with('contracts','cup')->find(1);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceList  $PriceList
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceList $PriceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceList  $PriceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $PriceList = PriceList::findOrFail($id);
            $PriceList->cup_id = $request->cup_id;
            $PriceList->cum = $request->cum;
            $PriceList->price = $request->price;
            $PriceList->save();
            return response()->json('Lista de precios actualizada correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceList  $PriceList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $PriceList = PriceList::findOrFail($id);
            $PriceList->delete();
            return response()->json('Lista de precios eliminada correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
