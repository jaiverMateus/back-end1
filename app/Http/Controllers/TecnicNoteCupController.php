<?php

namespace App\Http\Controllers;

use App\Models\tecnic_note_cup;
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
        return tecnic_note_cup::all();
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
            tecnic_note_cup::create($request->all());
            return response()->json('Nota tecnica cup creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tecnic_note_cup  $tecnic_note_cup
     * @return \Illuminate\Http\Response
     */
    public function show(tecnic_note_cup $tecnic_note_cup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tecnic_note_cup  $tecnic_note_cup
     * @return \Illuminate\Http\Response
     */
    public function edit(tecnic_note_cup $tecnic_note_cup)
    {
        $tecnic_note_cup = tecnic_note_cup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tecnic_note_cup  $tecnic_note_cup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $tecnic_note_cup = tecnic_note_cup::findOrFail($id);
            $tecnic_note_cup->update($request->all());
            
            return response()->json('cup nota tecnica actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tecnic_note_cup  $tecnic_note_cup
     * @return \Illuminate\Http\Response
     */
    public function destroy(tecnic_note_cup $tecnic_note_cup)
    {
        try{
            $tecnic_note_cup = tecnic_note_cup::findOrFail($id);
            $tecnic_note_cup->delete();
            return response()->json('Cup nota tecnica eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
