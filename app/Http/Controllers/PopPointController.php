<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepopPointsRequest;
use App\Http\Requests\UpdatepopPointsRequest;
use App\Models\popPoints;

class PopPointController extends Controller
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
        return view('createPopPoint');y
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepopPointsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepopPointsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function show(popPoints $popPoints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function edit(popPoints $popPoints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepopPointsRequest  $request
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepopPointsRequest $request, popPoints $popPoints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\popPoints  $popPoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(popPoints $popPoints)
    {
        //
    }
}
