<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TravelPackage;

class DashboardController extends Controller
{
    public function index()
    {
        $count_travel = TravelPackage::count();
        $count_transaction = Transaction::count();
        $count_pending = Transaction::where('transaction_status', 'PENDING')->count();
        $count_success = Transaction::where('transaction_status', 'SUCCESS')->count();
        return view('pages.admin.dashboard', compact(
            ['count_travel', 'count_transaction', 'count_pending', 'count_success']
        ));
    }
}
