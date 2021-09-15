@extends('layouts.admin')
@section('title','Travel Package')

@section('content')
    <div class="container-fluid">
           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

           <div class="row mb-3">
               <div class="col">
                   <a href="{{ route('travel-packages.create') }}" class="btn btn-primary py-2 px-5">Add New Travel Package</a>
               </div>
           </div>

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
                            <th scope="col">Title</th>
                            <th scope="col">Location</th>
                            <th scope="col">Type</th>
                            <th scope="col">Depature Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($travel_packages as $travel_package)
                            <tr class="text-center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $travel_package->title }}</td>
                              <td>{{ $travel_package->location }}</td>
                              <td>{{ $travel_package->type }}</td>
                              <td>{{ $travel_package->depature_date }}</td>
                              <td>
                                    <a href="{{ route('travel-packages.edit',$travel_package->id) }}" class="btn badge badge-warning">
                                      <i class="fa fa-pen"></i> Edit
                                  </a>
                                  <form action="{{ route('travel-packages.destroy',$travel_package->id) }}" class="d-inline-block" method="post">
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
                                <td colspan="6" class="text-center" >
                                  <p class="lead d-flex align-items-center justify-content-center" style="height: 200px">
                                    <b>Belum ada travel package</b>
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