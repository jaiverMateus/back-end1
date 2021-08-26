<?php

namespace App\Http\Controllers;

use App\Models\tecnic_note;
use Illuminate\Http\Request;

class TecnicNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return tecnic_note::all();
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
            tecnic_note::create($request->all());
            return response()->json('Nota tecnica creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tecnic_note  $tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function show(tecnic_note $tecnic_note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tecnic_note  $tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function edit(tecnic_note $tecnic_note)
    {
        $tecnic_note = tecnic_note::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tecnic_note  $tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $tecnic_note = tecnic_note::findOrFail($id);
            $tecnic_note->frequency = $request->frequency;
            $tecnic_note->alert_percentage = $request->alert_percentage;
            $tecnic_note->unit_value = $request->unit_value;
            $tecnic_note->date=$request->date;
            $tecnic_note->chance=$request->chance;
            $tecnic_note->save();
            return response()->json('Notas tecnicas actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tecnic_note  $tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $tecnic_note = tecnic_note::findOrFail($id);
            $tecnic_note->delete();
            return response()->json('administrador eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
