<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Venture;
use App\Models\VenturePlot;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $allVentures = Venture::all()->count();
        $allVenturePlots = VenturePlot::all()->count();
        $allCustomers = Customer::all()->count();
        $allStaffs = Staff::all()->count();

        return Inertia::render('Dashboard', [
            'summary' => array(
                'numberOfVentures'      => $allVentures,
                'numberOfVenturePlots'  => $allVenturePlots,
                'numberOfCustomers'     => $allCustomers,
                'numberOfStaff'         => $allStaffs,
            )
        ]);
    }
}
