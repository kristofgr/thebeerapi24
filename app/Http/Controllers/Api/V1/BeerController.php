<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBeerRequest;
use App\Http\Requests\UpdateBeerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeerResource;
use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $results = Beer::where('published', 1)->with("brewery", "color");

        $name = $request->query('name');
        if ($name) {
            $results->where('name', 'like', '%' . $name . '%');
            // $results->whereRaw("BINARY name  LIKE '%$name%' "); -> if search needs to be case sensitive
        }

        // $brewery = $request->query('brewery');
        // if ($brewery) {
        //     $results->where('brewery_id', $brewery);
        // }

        $color = $request->query('color');
        if ($color) {
            $results->where('color_id', $color);
        }

        return BeerResource::collection($results->get());
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
        return BeerResource::make($beer);
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
