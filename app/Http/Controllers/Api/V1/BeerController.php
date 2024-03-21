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
     * GET /api/v1/beers
     *
     * This endpoint allows you get all beers from the database.
     * Each result contains the entire data as available. 
     * 
     * @queryParam name string Filter by beer name. This filter acts as a LIKE-functionality.
     * @queryParam color integer Filter by color id.
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
     * GET /api/v1/beers/{id}
     *
     * This endpoint allows you get all data for one specific beer.
     */
    public function show(Beer $beer)
    {
        return BeerResource::make($beer);
    }
}
