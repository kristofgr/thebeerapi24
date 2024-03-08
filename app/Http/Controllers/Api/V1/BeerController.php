<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBeerRequest;
use App\Http\Requests\UpdateBeerRequest;
use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Beer::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beer $beer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeerRequest $request, Beer $beer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        //
    }
}
