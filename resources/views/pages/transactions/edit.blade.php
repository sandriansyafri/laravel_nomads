@extends('layouts.admin')
@section('title','Create Gallery')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Create Travel Package</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('transactions.update',$transaction->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="font-weight-bold" for="transaction_status">Current Status : {{ $transaction->transaction_status }}</label>
                            <select name="transaction_status" class="form-control">
                                <option value="">SELECT</option>
                                <option value="CANCEL">CANCEL</option>
                                <option value="IN_CART">IN CART</option>
                                <option value="PENDING">PENDING</option>
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="FAILED">FAILED</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection