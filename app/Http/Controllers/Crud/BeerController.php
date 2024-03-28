<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBeerRequest;
use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $beers = Beer::with("brewery", "color")->get();

        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeerRequest $request)
    {
        // Validation passed, get all validated data
        $data = $request->validated();
        Beer::create($data);

        return redirect()->route('beers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();
        return redirect()->route('beers.index');
    }
}
