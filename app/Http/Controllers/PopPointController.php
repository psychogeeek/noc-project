<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepopPointsRequest;
use App\Http\Requests\UpdatepopPointsRequest;
use Illuminate\Http\Request;
use App\Models\PopPoint;

class PopPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poppoints = PopPoint::all();
        return view('pop_point_list', compact('poppoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPopPoint');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepopPointsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pop_points',
            'address' => 'required',
            'type' => 'required',
            
        ]);
        // dd($validated);

        $model = new PopPoint();
        $model->name = $validated['name'];
        $model->address = $validated['address'];
        $model->type = $validated['type'];

        
        $model->save();
        dd($model);

        $customers = Customer::all();
        return redirect('/customer/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function show(PopPoint $poppoint)
    {

        $poppoint = PopPoint::find($poppoint)->first();
        return view('pop_point_info',compact('poppoint'));    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function edit(PopPoint $poppoint)
    {
        $poppoint = PopPoint::find($poppoint)->first();
        // dd($poppoint);
        return view('pop_point_edit',compact('poppoint'));    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepopPointsRequest  $request
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PopPoint $poppoint)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pop_points',
            'address' => 'required',
            'type' => 'required',
            
        ]);
        // dd($validated['name']);

        $model = PopPoint::find($poppoint)->first();
        // dd($model);
        $model->name = $validated['name'];
        $model->address = $validated['address'];
        $model->type = $validated['type'];    
        $model->save();
        return redirect('/popPoint/list');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopPoint $poppoint)
    {
        $poppoint = PopPoint::find($poppoint)->first();
        $poppoint->delete();
        return redirect('/popPoint/list');

    }
}
