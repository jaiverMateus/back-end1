<?php

namespace App\Http\Controllers;

use App\Models\TypeSalary;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class TypeSalaryController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(TypeSalary::get(['name As text', 'id As value']));
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
            $typeSalary  = TypeSalary::create($request->all());
            return $this->success(['message' => 'Tipo de salario creado correctamente', 'model' => $typeSalary]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeSalary  $typeSalary
     * @return \Illuminate\Http\Response
     */
    public function show(TypeSalary $typeSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeSalary  $typeSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeSalary $typeSalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeSalary  $typeSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeSalary $typeSalary)
    {
        try {
            $typeSalary = TypeSalary::find(request()->get('id'));
            $typeSalary->update(request()->all());
            return $this->success('Tipo de salario actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeSalary  $typeSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $typeSalary = TypeSalary::findOrFail($id);
            $typeSalary->delete();
            return $this->success('Tipo de salario eliminado correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
