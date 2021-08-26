<?php

namespace App\Http\Controllers;

use App\Models\cup;
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
        return cup::all();
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
            cup::create($request->all());
            return response()->json('CUP creado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function show(cup $cup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function edit(cup $cup)
    {
        $cup = cup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

       
            $cup = cup::findOrFail($id);
            $cup->name = $request->name;
            $cup->description = $request->description;
            $cup->notes = $request->notes;
            $cup->save();
            return response()->json('cup actualizado correctamente');
            
         }catch(\Throwable $th){
             return response()->json([$th->getMessage(), $th->getLine()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $cup = cup::findOrFail($id);
            $cup->delete();
            return response()->json('cup eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
