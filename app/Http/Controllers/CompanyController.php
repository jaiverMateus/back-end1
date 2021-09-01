<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Other;
use App\Models\TypeLocation;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($typeLocation = 0)
    {
        $brandShowCompany = 0;
        if ($typeLocation &&  $typeLocation != 3 ) {
            $typeLocation = TypeLocation::findOrfail($typeLocation);
            $brandShowCompany = $typeLocation->show_company_owners;
        }
        
        
        
        if(gettype($typeLocation) != 'object' && $typeLocation == 3){
          return CompanyResource::collection(Company::get());
        }
        
        
        
        
        
        
     //   dd($brandShowCompany);
        return CompanyResource::collection(Company::where('type', $brandShowCompany)->get());
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
            Company::create($request->all());
            return response()->json('Empresa creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
        try{
            $company = Company::find(request()->get('id'));
            $company->update(request()->all());
        return response()->json('administrador actualizado correctamente');}
        catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
        // $company->update(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $company = Company::findOrFail($id);
            $company->delete();
            return response()->json('Administrador eliminado correctamente');
        }catch(\Throwable $th){
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
