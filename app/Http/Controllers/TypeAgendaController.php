<?php

namespace App\Http\Controllers;

use App\Models\TypeAgenda;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class TypeAgendaController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(TypeAgenda::get(['name As text', 'id As value']));
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
            $typeAgenda  = TypeAgenda::create($request->all());
            return $this->success(['message' => 'Tipo de agenda creada correctamente', 'model' => $typeAgenda]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeAgenda  $typeAgenda
     * @return \Illuminate\Http\Response
     */
    public function show(TypeAgenda $typeAgenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeAgenda  $typeAgenda
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeAgenda $typeAgenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeAgenda  $typeAgenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeAgenda $typeAgenda)
    {
        try {
            $typeAgenda = TypeAgenda::find(request()->get('id'));
            $typeAgenda->update(request()->all());
            return $this->success('Tipo de agenda actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeAgenda  $typeAgenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $typeAgenda = TypeAgenda::findOrFail($id);
            $typeAgenda->delete();
            return $this->success('Tipo de agenda eliminada correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
