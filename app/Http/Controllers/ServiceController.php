<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Customer;
use App\Models\PopPoint;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
//        dd($select);
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $servicetypes = ServiceType::find($value);
        $data = $servicetypes->poppoints;
//        $data = DB::table('pop_point_service_types')->where($select, $value)->get();
        $output = '<option value="">Select</option>';
        foreach($data as $row)
        {
//            $nameType = $row->name . "-" . $row->id;
            $output .= '<option value="'.$row->id.'"> '.$row->name .'-' .$row->type .' </option>';
        }
        echo $output;
    }


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poppoints = PopPoint::all();
        $servicetypes = ServiceType::all();
        $customers = Customer::all();
        return view('service_create' , compact(array('servicetypes', 'poppoints', 'customers')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:service_types',
            'address' => 'required',
            'customer' => 'required',
            'service_type_id' => 'required',
            'pop_point_id' => 'required',
        ]);

        $model = new Service();

        $model->name = $validated['name'];
        $model->address = $validated['address'];
        $model->customer = $customer['customer'];
        $model->service_tpye_id = $validated['service_tpye_id'];
        $model->pop_point_id = $validated['pop_point_id'];
        $model->save();
//        return redirect('/service/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
