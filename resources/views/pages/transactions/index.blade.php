@extends('layouts.admin')
@section('title','Transactions')
@section('content')
    <div class="container-fluid">
           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

           @if (session('status'))
           <div class="row">
             <div class="col">
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
             </div>
           </div>
          @endif

           <div class="row">
               <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Travel Package</th>
                            <th scope="col">User</th>
                            <th scope="col">Additional Visa</th>
                            <th scope="col">Total Transaction</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr class="text-center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $transaction->travel_package->title }}</td>
                              <td>{{ $transaction->user->name }}</td>
                              <td>{{ $transaction->addtional_visa }}</td>
                              <td>{{ $transaction->transaction_total }}</td>
                              <td>{{ $transaction->transaction_status }}</td>
                              <td>
                                    <a href="{{ route('transactions.show',$transaction->id) }}" class="btn badge badge-primary">
                                      <i class="fa fa-pen"></i> Detail
                                  </a>
                                    <a href="{{ route('transactions.edit',$transaction->id) }}" class="btn badge badge-warning">
                                      <i class="fa fa-pen"></i> Edit
                                  </a>
                                  <form action="{{ route('transactions.destroy',$transaction->id) }}" class="d-inline-block" method="post">
                                      @csrf
                                      @method('delete')
                                      <button onclick="return confirm('Delete this data?')" type="submit" class="btn badge badge-danger">
                                        <i class="fa fa-trash"></i> Delete
                                      </button>
                                  </form>
                              </td>
                          </tr>
                              @empty
                              <tr>
                                <td colspan="7" class="text-center" >
                                  <p class="lead d-flex align-items-center justify-content-center" style="height: 200px">
                                    <b>Belum ada transaction</b>
                                  </p>
                                </td>
                              </tr>
                            @endforelse
                        </tbody>
                      </table>
                  </div>
               </div>
           </div>
    </div>
@endsection