<?php

namespace App\Http\Controllers;

use App\Models\regime_tecnic_note;
use Illuminate\Http\Request;

class RegimeTecnicNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return regime_tecnic_note::all();
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
            regime_tecnic_note::create($request->all());
            return response()->json('Nota tecnica regimen creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\regime_tecnic_note  $regime_tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function show(regime_tecnic_note $regime_tecnic_note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\regime_tecnic_note  $regime_tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function edit(regime_tecnic_note $regime_tecnic_note)
    {
        $regime_tecnic_note = regime_tecnic_note::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\regime_tecnic_note  $regime_tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $regime_tecnic_note = regime_tecnic_note::findOrFail($id);
            $regime_tecnic_note->update($request->all());
            // $administrator->name = $request->name;
            // $administrator->number = $request->number;
            // $administrator->type = $request->type;
            // $administrator->save();
            return response()->json('Nota tecnica regimen actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\regime_tecnic_note  $regime_tecnic_note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $regime_tecnic_note = regime_tecnic_note::findOrFail($id);
            $regime_tecnic_note->delete();
            return response()->json('Nota tecnica regimen eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
