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
     *
     */
    public function index()
    {
        $services = Service::all();
//        $services = new Service();
//        return $services->test($service);
////        $services-
////
////        dd($service->customer);
        return view('service_list' , compact('services'));
    }

    function fetch(Request $request)
    {
//        $select = $request->get('select');
////        dd($select);
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $servicetypes = ServiceType::find($value);
        $data = $servicetypes->poppoints;
        $output = '<option value="">Select</option>';
        foreach($data as $row)
        {
            if($row->type == "pop"){
                $pop = Service::where('pop_point_id' ,$row->id);
                $pop_count = $pop->count();
                if ($pop_count < 1){
                    $output .= '<option value="'.$row->id.'"> '.$row->name .'-' .$row->type .' </option>';
                }

            }

            if($row->type == "point"){
                $point = Service::where('pop_point_id' ,$row->id);
                $point_count = $point->count();
                if ($point_count < 5){
                    $output .= '<option value="'.$row->id.'"> '.$row->name .'-' .$row->type .' </option>';
                }

            }

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
//        dd($request);
        $validated = $request->validate([
            'name' => 'required|unique:service_types',
            'address' => 'required',
            'customer_id' => 'required',
            'service_type_id' => 'required',
            'pop_point_id' => 'required',
        ]);
//        return $request;
        $model = new Service();

        $model->name = $validated['name'];
        $model->address = $validated['address'];
        $model->customer_id = $validated['customer_id'];
        $model->service_type_id = $validated['service_type_id'];
        $model->pop_point_id = $validated['pop_point_id'];
        $model->save();
        return redirect('/service/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service_info', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return string
     */
    public function edit(Service $service)
    {

      $service = Service::find($service)->first();
      $customers = Customer::all();
      $servicetypes = ServiceType::all();
      $poppoints = PopPoint::all();
      return view('service_edit' , compact(array('service', 'customers', 'servicetypes', 'poppoints')));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|unique:services',
            'address' => 'required',
            'customer_id' => 'required',
            'service_type_id' => 'required',
            'pop_point_id' => 'required',
        ]);
        // dd($validated['name']);
//        dd($request);
        $model = Service::find($service)->first();


        $model->name = $validated['name'];
        $model->address = $validated['address'];
        $model->customer_id = $validated['customer_id'];
        $model->service_type_id = $validated['service_type_id'];
        $model->pop_point_id = $validated['pop_point_id'];

        $model->save();
//        dd($model);
        return redirect('/service/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
       $service = Service::find($service)->first();
//       dd($service);
       $service->delete();
       return redirect('/service/list');
    }
}
