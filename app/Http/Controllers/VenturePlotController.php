<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Venture;
use App\Models\VenturePlot;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;

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
    public function show(VenturePlot $venturePlot)
    {
        dd($venturePlot);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VenturePlot $venturePlot)
    {
        $allCustomers = Customer::orderBy('id', 'DESC')->get(['id', 'customer_name', 'customer_phone']);
        // $allCustomers = array(
        //     'id' => 1,
        //     'text'  => 'abc'
        // );
        $allActiveStaffs = Staff::where('staff_active_status', 1)->get(['id', 'staff_name', 'staff_phone']);
        return Inertia::render('VenturePlot/Edit', [
            'venture_plot'  => $venturePlot,
            'all_customers' => $allCustomers,
            'all_staffs'    => $allActiveStaffs,
        ]);
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
    public function destroy(VenturePlot $venturePlot): RedirectResponse
    {
        $ventureInfo = Venture::find($venturePlot->venture_id);
        $ventureInfo->number_of_plot = ($ventureInfo->number_of_plot - 1);
        $ventureInfo->save();

        $venturePlot->delete();
        return Redirect::route('venture-plots.index')->with(['status' => 'success', 'message' => 'Venture Plot Deleted Successfully']);
    }
}
