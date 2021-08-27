<?php

namespace App\Http\Controllers;

use App\Models\RegimeTecnicNote;
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
        return RegimeTecnicNote::all();
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
            RegimeTecnicNote::create($request->all());
            return response()->json('Nota tecnica regimen creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegimeTecnicNote  $RegimeTecnicNote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $RegimeTecnicNote = RegimeTecnicNote::findOrFail($id);
            // return response()->json( $administrator);
            return RegimeTecnicNote::with('regime','tecnic_note')->find(1);
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegimeTecnicNote  $RegimeTecnicNote
     * @return \Illuminate\Http\Response
     */
    public function edit(RegimeTecnicNote $RegimeTecnicNote)
    {
        $RegimeTecnicNote = RegimeTecnicNote::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegimeTecnicNote  $RegimeTecnicNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $RegimeTecnicNote = RegimeTecnicNote::findOrFail($id);
            $RegimeTecnicNote->update($request->all());
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
     * @param  \App\Models\RegimeTecnicNote  $RegimeTecnicNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $RegimeTecnicNote = RegimeTecnicNote::findOrFail($id);
            $RegimeTecnicNote->delete();
            return response()->json('Nota tecnica regimen eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
