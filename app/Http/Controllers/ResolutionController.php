<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(Resolution::get(['name As text', 'id As value']));
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
            $resolution  = Resolution::create($request->all());
            return $this->success(['message' => 'Resolucion creada correctamente', 'model' => $resolution]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function show(Resolution $resolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function edit(Resolution $resolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resolution $resolution)
    {
        try {
            $resolution = Resolution::find(request()->get('id'));
            $resolution->update(request()->all());
            return $this->success('Resolucion actualizada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $resolution = Resolution::findOrFail($id);
            $resolution->delete();
            return $this->success('Resolucion eliminada correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
