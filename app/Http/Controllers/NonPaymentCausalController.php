<?php

namespace App\Http\Controllers;

use App\Models\NonPaymentCausal;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class NonPaymentCausalController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(NonPaymentCausal::get(['name As text', 'id As value']));
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
            $nonPaymentCausal  = NonPaymentCausal::create($request->all());
            return $this->success(['message' => 'Causal de no pago creado correctamente', 'model' => $nonPaymentCausal]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NonPaymentCausal  $nonPaymentCausal
     * @return \Illuminate\Http\Response
     */
    public function show(NonPaymentCausal $nonPaymentCausal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NonPaymentCausal  $nonPaymentCausal
     * @return \Illuminate\Http\Response
     */
    public function edit(NonPaymentCausal $nonPaymentCausal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NonPaymentCausal  $nonPaymentCausal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonPaymentCausal $nonPaymentCausal)
    {
        try {
            $nonPaymentCausal = NonPaymentCausal::find(request()->get('id'));
            $nonPaymentCausal->update(request()->all());
            return $this->success('Causal de no pago actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NonPaymentCausal  $nonPaymentCausal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $nonPaymentCausal = NonPaymentCausal::findOrFail($id);
            $nonPaymentCausal->delete();
            return $this->success(' Causal de no pago eliminado correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
