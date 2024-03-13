<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brewery;
use App\Http\Controllers\Controller;
use App\Http\Resources\BreweryResource;
use Illuminate\Http\Request;

class BreweryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $results = Brewery::where('published', 1);
        // $results = Beer::all();

        $name = $request->query('name');
        if ($name) {
            $results->where('name', 'like', '%' . $name . '%');
            // $results->whereRaw("BINARY name  LIKE '%$name%' "); -> if search needs to be case sensitive
        }

        return BreweryResource::collection($results->get());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brewery $brewery)
    {
        return BreweryResource::make($brewery);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brewery $brewery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brewery $brewery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brewery $brewery)
    {
        //
    }
}
