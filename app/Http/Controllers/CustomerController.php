<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCustomer');
//        $service = Service::all();
//        dd($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'first_name' => 'required|unique:table, field',
            'last_name' => 'required|unique:table, field',
            'address' => 'required',
            'phone_number' => 'required|unique:table, field',
            'code_number' => 'required|unique:table, field',
            'email' => 'required|unique:table, field',
            'password' => 'required|unique:table, field',
        ]);
        dd($request);
        $model = new Customer();
        $model->first_name = $validated['first_name'];
        $model->last_name = $validated['last_name'];
        $model->address = $validated['address'];
        $model->phone_number = $validated['phone_number'];
        $model->code_number = $validated['code_number'];
        $model->email = $validated['email'];
        $model->password = $validated['password'];
        $model->save();
        dd($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
