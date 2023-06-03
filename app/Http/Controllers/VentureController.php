<?php

namespace App\Http\Controllers;

use App\Http\Requests\Venture\VentureStoreRequest;
use App\Models\Venture;
use App\Models\VenturePlot;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VentureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $data = Venture::orderBy('id', 'DESC')->get();
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
    public function store(VentureStoreRequest $request): RedirectResponse
    {
        $checkExists = Venture::where('venture_name_slug', Str::slug($request->venture_name))->exists();
        if ($checkExists) {
            return Redirect::route('ventures.create')->with(['status' => 'error', 'message' => 'Venture Name Already Exist']);
        } else {
            DB::beginTransaction();
            try {
                $newVenture = new Venture;
                $newVenture->venture_name           = $request->venture_name;
                $newVenture->venture_name_slug      = Str::slug($request->venture_name);
                $newVenture->venture_description    = $request->venture_description;
                $newVenture->number_of_plot         = $request->number_of_plot;
                $newVenture->per_square_feet_price  = $request->per_square_feet_price;

                if ($request->hasFile('venture_brochure')) {
                    $file = $request->file('venture_brochure');
                    $fileExtension = $request->venture_brochure->extension();
                    $fileName = Str::slug($request->venture_name) . "_" . Str::random(5) . "_" . date('his') . '.' . $fileExtension;
                    $folderpath = public_path() . '/venture';
                    $file->move($folderpath, $fileName);
                    $newVenture->venture_brochure = '/venture/' . $fileName;
                }

                if ($request->hasFile('venture_layout')) {
                    $file = $request->file('venture_layout');
                    $fileExtension = $request->venture_layout->extension();
                    $fileName = Str::slug($request->venture_name) . "_" . Str::random(5) . "_" . date('his') . '.' . $fileExtension;
                    $folderpath = public_path() . '/venture';
                    $file->move($folderpath, $fileName);
                    $newVenture->venture_layout = '/venture/' . $fileName;
                }

                $newVenture->active_status   = $request->active_status;
                $newVenture->save();

                for ($i = 1; $i <= $request->number_of_plot; $i++) {
                    $newVenturePlot = new VenturePlot;
                    $newVenturePlot->venture_id = $newVenture->id;
                    $newVenturePlot->plot_id    = $i;
                    $newVenturePlot->plot_name  = $newVenture->venture_name . '- Plot Id -' . $i;
                    $newVenturePlot->save();
                }
                DB::commit();

                return Redirect::route('ventures.index')->with(['status' => 'success', 'message' => 'Venture Created Successfully']);
            } catch (\Exception $e) {
                DB::rollback();
                return Redirect::route('ventures.index')->with(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
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
    public function edit(Venture $venture)
    {
        return Inertia::render('Venture/Edit', [
            'venture' => $venture
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        dd($request->all());
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
