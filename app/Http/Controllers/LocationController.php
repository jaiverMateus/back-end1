<?php

namespace App\Http\Controllers;

use App\Http\Resources\SedeResource;
use App\Models\Location;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ${this.company}/${this.subappointment.procedure

    public function index()
    {
        // return response()->json('jghkghj');
        return SedeResource::collection(
            Location::where('company_id', request()->get('company'))->get(['id', 'name'])
        );
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
            $location  = Location::create($request->all());
            return $this->success(['message' => 'Sede creada correctamente', 'model' => $location]);
            // return response()->json('Sede creada correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Location  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Location $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Location  $sede
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $sede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Location  $sede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $sede)
    {
        try {
            $sede = Location::find(request()->get('id'));
            $sede->update(request()->all());
            return $this->success('Sede actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Location  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $sede = Location::findOrFail($id);
            $sede->delete();
            return $this->success('Sede eliminada correctamente', 204);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage(), $th->getLine()]);
        }
    }
}
