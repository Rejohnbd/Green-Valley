<?php

use App\Http\Controllers\Api\Web\WebVentureController;
use Illuminate\Support\Facades\Route;

Route::get('all-ventures', [WebVentureController::class, 'allVentureItems']);
Route::get('venture-details/{id}', [WebVentureController::class, 'ventureDetialById']);
