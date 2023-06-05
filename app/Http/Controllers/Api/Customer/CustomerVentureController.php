<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\CustomerVentureList;
use App\Models\Venture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerVentureController extends Controller
{
    public function allVentureItems()
    {
        $data = Venture::withCount(['saleVenturePlots', 'availableVenturePlots'])->where('active_status', 1)->orderBy('id', 'DESC')->get();

        return Response([
            'status'    => true,
            'message'   => 'All Ventures',
            'data'      => CustomerVentureList::collection($data)
        ], Response::HTTP_OK);
    }
}
