<?php

namespace App\Http\Controllers;

use App\Models\regime;
use Illuminate\Http\Request;

class RegimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return regime::all();
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
            regime::create($request->all());
            return response()->json('Regimen creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function show(regime $regime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function edit(regime $regime)
    {
        $regime = regime::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $regime = regime::findOrFail($id);
            $regime->name = $request->name;
            $regime->description = $request->description;
            
            $regime->save();
            return response()->json('Regimen actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $regime = regime::findOrFail($id);
            $regime->delete();
            return response()->json('Regimen eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
