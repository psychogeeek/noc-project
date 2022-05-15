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
        $customers = Customer::all();
//        $customers = Customer::find(2);
//        dd($customers->services);
        return view('customerList', compact('customers'));
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
//        dd($request);
        $validated = $request->validate([
            'first_name' => 'required|unique:customers',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'code_number' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $model = new Customer();
        $model->first_name = $validated['first_name'];
        $model->last_name = $validated['last_name'];
        $model->address = $validated['address'];
        $model->phone_number = $validated['phone_number'];
        $model->code_number = $validated['code_number'];
        $model->email = $validated['email'];
        $model->password = $validated['password'];
        $model->save();

        $customers = Customer::all();
        return redirect('/customer/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = Customer::find($customer);
        return view('customer_info',compact('customer'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::find($customer);
        return view('customerEdit',compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();
        $customer = Customer::find($customer)->first();

        $customer->first_name = $input['first_name'];
        $customer->last_name = $input['last_name'];
        $customer->address = $input['address'];
        $customer->phone_number = $input['phone_number'];
        $customer->email = $input['email'];
        $customer->code_number = $input['code_number'];
        $customer->password = $input['password'];

        $customer->save();

        return redirect('/customer/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
       $customer = Customer::find($customer)->first();
       $customer->delete();
       return redirect('/customer/list');

    }
}
