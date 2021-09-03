<?php

namespace App\Http\Controllers;

use App\Models\TypeContract;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class TypeContractController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(TypeContract::get(['name As text', 'id As value']));
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
            $typeContract  = TypeContract::create($request->all());
            return $this->success(['message' => 'Tipo de contrato creado correctamente', 'model' => $typeContract]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeContract  $typeContract
     * @return \Illuminate\Http\Response
     */
    public function show(TypeContract $typeContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeContract  $typeContract
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeContract $typeContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeContract  $typeContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeContract $typeContract)
    {
        try {
            $typeContract = TypeContract::find(request()->get('id'));
            $typeContract->update(request()->all());
            return $this->success('Tipo de contrato actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeContract  $typeContract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $typeContract = TypeContract::findOrFail($id);
            $typeContract->delete();
            return $this->success('Tipo de contrato eliminado correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
