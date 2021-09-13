<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.user.checkout');
    }

    public function success()
    {
        return view('pages.user.checkout-success');
    }
}
