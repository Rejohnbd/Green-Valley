<?php

namespace App\Http\Controllers;

use App\Models\VenturePlot;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VenturePlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $data = VenturePlot::with('ventureInfo')->paginate(10);
        return Inertia::render('VenturePlot/List', [
            'venture_plots' => $data
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VenturePlot $venturePlot)
    {
        dd($venturePlot);
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
    public function destroy(string $id)
    {
        //
    }
}
