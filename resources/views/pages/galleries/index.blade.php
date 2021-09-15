@extends('layouts.admin')
@section('title','Gallery')

@section('content')
    <div class="container-fluid">
           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>

           <div class="row mb-3">
               <div class="col">
                   <a href="{{ route('galleries.create') }}" class="btn btn-primary py-2 px-5">Add New Gallery</a>
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
                            <th scope="col">Travel Package</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                            <tr class="text-center">
                              <td>{{ $loop->iteration }}</td>
                              <td >{{ $gallery->travel_package->title }}</td>
                              <td>
                                <img width="100px" src="{{ Storage::url($gallery->image) }}" alt="">
                              </td>
                              <td>
                                    <a href="{{ route('galleries.edit',$gallery->id) }}" class="btn badge badge-warning">
                                      <i class="fa fa-pen"></i> Edit
                                  </a>
                                  <form action="{{ route('galleries.destroy',$gallery->id) }}" class="d-inline-block" method="post">
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
                                    <b>Belum ada gallery</b>
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