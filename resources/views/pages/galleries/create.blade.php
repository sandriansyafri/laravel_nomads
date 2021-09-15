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
                    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="travel_package_id">Title</label>
                            <select name="travel_package_id" id="travel_package_id" class="form-control">
                                @forelse ($travel_packages as $travel_package)
                                    <option value="{{ $travel_package->id }}">{{ $travel_package->title }}</option>
                                @empty
                                    <option value="">Travel Package Undifined</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="d-block" >
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