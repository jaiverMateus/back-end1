<?php

namespace App\Http\Controllers;

use App\Models\Dependence;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class DependenceController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Dependence::get(['nombre As text', 'id As value']));
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
            $dependence  = Dependence::create($request->all());
            return $this->success(['message' => 'Dependencia creada correctamente', 'model' => $dependence]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function show(Dependence $dependence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependence $dependence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependence $dependence)
    {
        try {
            $dependence = Dependence::find(request()->get('id'));
            $dependence->update(request()->all());
            return $this->success('Dependencia actualizada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dependence = dependence::findOrFail($id);
            $dependence->delete();
            return $this->success('Dependencia eliminada correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
