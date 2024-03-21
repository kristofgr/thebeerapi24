<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;

class ColorController extends Controller
{

    /**
     * GET /api/v1/colors
     *
     * This endpoint allows you get all colors as used as attribute for beer.
     */
    public function index()
    {
        $results = Color::where('published', 1);
        return ColorResource::collection($results->get());
    }
}
