<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(TravelPackage $travel_package)
    {

        $validation = Transaction::where('transaction_status', 'IN_CART')
            ->where('user_id', Auth::user()->id)
            ->get();

        if ($validation->isEmpty()) {
            $transaction = Transaction::create([
                'travel_package_id' => $travel_package->id,
                'user_id' => Auth::user()->id,
                'addtional_visa' => 0,
                'transaction_total' => $travel_package->price,
                'transaction_status' => 'IN_CART'
            ]);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'username' => Auth::user()->username,
                'nationality' => 'ID',
                'is_visa' => false,
                'doe_passport' => Carbon::now()->addYear(5)
            ]);

            return redirect()->route('checkout', $transaction->id);
        } else {
            return redirect()->route('checkout', $validation[0]->id);
        }
    }

    public function index(Transaction $transaction)
    {
        return view('pages.user.checkout', compact(['transaction']));
    }

    public function create(Request $request, Transaction $transaction)
    {

        $request->validate([
            'username' => 'required|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['doe_passport'] = date('Y-m-d', strtotime($request->doe_passport));
        $data['nationality'] = 'ID';
        $data['transaction_id'] = $transaction->id;


        TransactionDetail::create($data);

        if ($request->is_visa) {
            $transaction->addtional_visa += 1000;
            $transaction->transaction_total += 1000;
        }

        $transaction->update([
            'transaction_total' => $transaction->transaction_total += $transaction->travel_package->price
        ]);


        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(TransactionDetail $transaction_detail)
    {
        $transaction = $transaction_detail->transaction;

        if ($transaction_detail->is_visa) {
            $transaction->update([
                'addtional_visa' => $transaction->addtional_visa -= 1000,
                'transaction_total' => $transaction->transaction_total -= 1000,
            ]);
        }

        $transaction->update([
            'transaction_total' => $transaction->transaction_total -= $transaction->travel_package->price
        ]);

        $transaction_detail->delete();

        return redirect()->route('checkout', $transaction->id);
    }

    public function success(Transaction $transaction)
    {
        $transaction_detail = $transaction->transaction_detail;

        if ($transaction_detail->count()) {
            $transaction->update([
                'transaction_status' => 'SUCCESS'
            ]);
        } else {
            return redirect()->route('checkout', $transaction->id);
        }

        return view('pages.user.checkout-success');
    }

    public function failed(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('home');
    }
}
