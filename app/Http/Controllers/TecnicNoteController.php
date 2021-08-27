<?php

namespace App\Http\Controllers;

use App\Models\TecnicNote;
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
        return TecnicNote::all();
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
            TecnicNote::create($request->all());
            return response()->json('Nota tecnica creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TecnicNote  $TecnicNote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $TecnicNote = TecnicNote::findOrFail($id);
            // return response()->json( $administrator);
            return TecnicNote::with('tecnicNoteCup','regimeTecnicNote')->find(2);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TecnicNote  $TecnicNote
     * @return \Illuminate\Http\Response
     */
    public function edit(TecnicNote $TecnicNote)
    {
        $TecnicNote = TecnicNote::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TecnicNote  $TecnicNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $TecnicNote = TecnicNote::findOrFail($id);
            $TecnicNote->frequency = $request->frequency;
            $TecnicNote->alert_percentage = $request->alert_percentage;
            $TecnicNote->unit_value = $request->unit_value;
            $TecnicNote->date=$request->date;
            $TecnicNote->chance=$request->chance;
            $TecnicNote->save();
            return response()->json('Notas tecnicas actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TecnicNote  $TecnicNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $TecnicNote = TecnicNote::findOrFail($id);
            $TecnicNote->delete();
            return response()->json('administrador eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
