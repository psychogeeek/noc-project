<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use App\Models\PopPoint;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = ServiceType::find(1)->first();
        dd($test->poppoints);


        $servicetypes = ServiceType::all();
        return view('service_type_list' , compact('servicetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poppoints = PopPoint::all();
        return view('servicetype_create', compact('poppoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:service_type',
            'number' => 'required',

        ]);

        $model = new ServiceType();
        $model->name = $validated['name'];
        $model->number = $validated['number'];


        $model->save();
        dd($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceType $servicetype)
    {
        $servicetype = ServiceType::find($servicetype)->first();
        return view('service_type_info', compact('servicetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceType $servicetype)
    {
        $servicetype = ServiceType::find($servicetype)->first();
        return view('service_type_edit', compact('servicetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTypeRequest  $request
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceType $servicetype)
    {
        $validated = $request->validate([
            'name' => 'required|unique:service_types',
            'number' => 'required',

        ]);
        // dd($validated['name']);

        $model = ServiceType::find($servicetype)->first();
        // dd($model);
        $model->name = $validated['name'];
        $model->number = $validated['number'];
        $model->save();
        return redirect('/serviceType/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $servicetype)
    {
        $servicetype = ServiceType::find($servicetype)->first();
        $servicetype->delete();
        return redirect('/serviceType/list');

    }
}
