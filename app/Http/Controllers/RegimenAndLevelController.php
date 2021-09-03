<?php

namespace App\Http\Controllers;

use App\Models\RegimenAndLevel;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class RegimenAndLevelController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(RegimenAndLevel::get(['regimen_id As value', 'level_id As value']));
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
            $regimenAndLevel  = RegimenAndLevel::create($request->all());
            return $this->success(['message' => 'Regimen y niveles creados correctamente', 'model' => $regimenAndLevel]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegimenAndLevel  $regimenAndLevel
     * @return \Illuminate\Http\Response
     */
    public function show(RegimenAndLevel $regimenAndLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegimenAndLevel  $regimenAndLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(RegimenAndLevel $regimenAndLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegimenAndLevel  $regimenAndLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegimenAndLevel $regimenAndLevel)
    {
        try {
            $regimenAndLevel = RegimenAndLevel::find(request()->get('id'));
            $regimenAndLevel->update(request()->all());
            return $this->success('Regimen y niveles actualizados correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegimenAndLevel  $regimenAndLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $regimenAndLevel = RegimenAndLevel::findOrFail($id);
            $regimenAndLevel->delete();
            return $this->success('Regimen y niveles eliminados correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
