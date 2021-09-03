<?php

namespace App\Http\Controllers;

use App\Models\CancellationCausal;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CancellationCausalController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(CancellationCausal::get(['name As text', 'id As value']));
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
            $cancellationCausal  = CancellationCausal::create($request->all());
            return $this->success(['message' => 'Causal de anulacion creado correctamente', 'model' => $cancellationCausal]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CancellationCausal  $cancellationCausal
     * @return \Illuminate\Http\Response
     */
    public function show(CancellationCausal $cancellationCausal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CancellationCausal  $cancellationCausal
     * @return \Illuminate\Http\Response
     */
    public function edit(CancellationCausal $cancellationCausal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CancellationCausal  $cancellationCausal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CancellationCausal $cancellationCausal)
    {
        try {
            $cancellationCausal = CancellationCausal::find(request()->get('id'));
            $cancellationCausal->update(request()->all());
            return $this->success('Causal de anulacion actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CancellationCausal  $cancellationCausal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cancellationCausal = CancellationCausal::findOrFail($id);
            $cancellationCausal->delete();
            return $this->success('Cusal de anulacion eliminado correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
