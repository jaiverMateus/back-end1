<?php

namespace App\Http\Controllers;

use App\Models\TecnicNoteCup;
use App\Models\Cup;
use App\Models\TecnicNote;
use Illuminate\Http\Request;

class TecnicNoteCupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TecnicNoteCup::all();
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
            TecnicNoteCup::create($request->all());
            return response()->json('Nota tecnica cup creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TecnicNoteCup  $TecnicNoteCup
     * @return \Illuminate\Http\Response
     */

     public function getTecnicNoteCupCUPId($id){
        try{
            
            return Cup::with('tecnicNoteCup')->Where('id',$id)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
     }

     public function getTecnicNoteCupTecnicId($id){
        try{
            
            return TecnicNote::with('tecnicNoteCup')->Where('id',$id)->get();         
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
     }
    public function show($id)
    {
        try{
            $TecnicNoteCup = TecnicNoteCup::findOrFail($id);
            // return response()->json( $administrator);
            return TecnicNoteCup::with('cup','tecnic_note')->find(3);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TecnicNoteCup  $TecnicNoteCup
     * @return \Illuminate\Http\Response
     */
    public function edit(TecnicNoteCup $TecnicNoteCup, $id)
    {
        $TecnicNoteCup = TecnicNoteCup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TecnicNoteCup  $TecnicNoteCup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $TecnicNoteCup = TecnicNoteCup::findOrFail($id);
            $TecnicNoteCup->update($request->all());
            
            return response()->json('cup nota tecnica actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TecnicNoteCup  $TecnicNoteCup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TecnicNoteCup $TecnicNoteCup, $id)
    {
        try{
            $TecnicNoteCup = TecnicNoteCup::findOrFail($id);
            $TecnicNoteCup->delete();
            return response()->json('Cup nota tecnica eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
