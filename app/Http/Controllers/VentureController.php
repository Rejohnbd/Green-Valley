<?php

namespace App\Http\Controllers;

use App\Models\Venture;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class VentureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $data = Venture::with('projects')->orderBy('id', 'DESC')->get();
        return Inertia::render('Venture/List', [
            'ventures' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Venture/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->request->add(['venture_name_slug' => Str::slug($request->venture_name)]);
        Venture::create($request->validate([
            'venture_name' => 'required',
            'venture_name_slug' => 'required',
        ]));
        return Redirect::route('ventures.index')->with(['status' => 'success', 'message' => 'Venture Created Successfully']);
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
    public function destroy(string $id)
    {
        //
    }

    public function getAllVentures()
    {
        $data = Venture::orderBy('id', 'DESC')->get();
        return response()->json([
            'status'    => 'true',
            'message'   => 'All Ventures',
            'data'      => $data
        ], 200);
    }
}
