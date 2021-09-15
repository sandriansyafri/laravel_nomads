@extends('layouts.admin')
@section('title','Transactions')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

        <div class="row">
            <div class="col">
             <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{ $transaction->id }}</td>
                        </tr>
                        <tr>
                            <th>Pembeli</th>
                            <td>{{ $transaction->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Additional Visa</th>
                            <td>{{ $transaction->addtional_visa }}</td>
                        </tr>
                        <tr>
                            <th>Total Transaction</th>
                            <td>{{ $transaction->transaction_total }}</td>
                        </tr>
                        <tr>
                            <th>Status Transaction</th>
                            <td>{{ $transaction->transaction_status }}</td>
                        </tr>
                        <tr>
                            <th style="vertical-align: top;">Pembelian / Transaksi</th>
                            <td>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Nationality</th>
                                            <th>Visa</th>
                                            <th>Doe Passport</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse ($transaction->transaction_detail as $transaction_detail)
                                           <tr>
                                               <td>{{ $loop->iteration }}</td>
                                               <td>{{ $transaction_detail->username }}</td>
                                               <td>{{ $transaction_detail->nationality }}</td>
                                               <td>{{ $transaction_detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                               <td>{{ $transaction_detail->doe_passport }}</td>
                                           </tr>
                                       @empty
                                        <tr>
                                            <td colspan="5">Data tidak ada</td>
                                        </tr>
                                       @endforelse
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </thead>                    
                </table>
               </div>
            </div>
        </div>

    </div>
@endsection