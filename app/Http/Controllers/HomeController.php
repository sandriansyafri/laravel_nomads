<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::with(['gallery'])->get();
        return view('pages.user.home', compact(['travel_packages']));
    }
}
