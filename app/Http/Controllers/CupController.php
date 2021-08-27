<?php

namespace App\Http\Controllers;

use App\Models\Cup;
use Illuminate\Http\Request;

class CupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cup::all();
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
            Cup::create($request->all());
            return response()->json('CUP creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cup  $Cup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $Cup = Cup::findOrFail($id);
            // return response()->json( $administrator);
            return Cup::with('tecnicNoteCup','priceList')->find(1);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cup  $Cup
     * @return \Illuminate\Http\Response
     */
    public function edit(Cup $Cup)
    {
        $Cup = Cup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cup  $Cup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $Cup = Cup::findOrFail($id);
            $Cup->name = $request->name;
            $Cup->description = $request->description;
            $Cup->notes = $request->notes;
            $Cup->save();
            return response()->json('Cup actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cup  $Cup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $Cup = Cup::findOrFail($id);
            $Cup->delete();
            return response()->json('Cup eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
