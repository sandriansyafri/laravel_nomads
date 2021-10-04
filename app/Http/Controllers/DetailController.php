<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(TravelPackage $travel_package)
    {
        return view('pages.user.detail', compact(['travel_package']));
    }
}
