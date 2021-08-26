<?php

namespace App\Http\Controllers;

use App\Models\benefits_plan;
use Illuminate\Http\Request;

class BenefitsPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return benefits_plan::all();
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
            benefits_plan::create($request->all());
            return response()->json('Plan de beneficios creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\benefits_plan  $benefits_plan
     * @return \Illuminate\Http\Response
     */
    public function show(benefits_plan $benefits_plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\benefits_plan  $benefits_plan
     * @return \Illuminate\Http\Response
     */
    public function edit(benefits_plan $benefits_plan)
    {
        $benefits_plan = benefits_plan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\benefits_plan  $benefits_plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        try{
           
          $benefits_plan = benefits_plan::findOrFail($id);
          $benefits_plan->name = $request->name;
          $benefits_plan->description = $request->description;
          $benefits_plan->save();
          return response()->json('Plan de beneficio actualizado correctamente');   
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\benefits_plan  $benefits_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $benefits_plan = benefits_plan::findOrFail($id);
            $benefits_plan->delete();
            return response()->json('plan de beneficios eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
    
}
