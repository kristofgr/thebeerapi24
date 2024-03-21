<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Brewery;
use App\Http\Controllers\Controller;
use App\Http\Resources\BreweryResource;
use Illuminate\Http\Request;

class BreweryController extends Controller
{

    /**
     * GET /api/v1/breweries
     *
     * This endpoint allows you get all breweries from the database.
     * Each result contains the entire data as available. 
     
     * @queryParam name string Filter by brewery name. This filter acts as a LIKE-functionality.
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
     * GET /api/v1/brewery/{id}
     *
     * This endpoint allows you get all data for one specific brewery.
     */
    public function show(Brewery $brewery)
    {
        return BreweryResource::make($brewery);
    }
}
