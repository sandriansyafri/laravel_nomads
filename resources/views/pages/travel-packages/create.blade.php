@extends('layouts.admin')
@section('title','Create Travel Package')

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
                    <form action="{{ route('travel-packages.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="title">Title</label>
                                    <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autocomplete="off">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                      
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="location">Location</label>
                                    <input value="{{ old('location') }}" type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"  autocomplete="off">
                                     @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="featured_event">Featured Event</label>
                                    <input value="{{ old('featured_event') }}" type="text" class="form-control @error('featured_event') is-invalid @enderror" id="featured_event" name="featured_event" autocomplete="off">
                                     @error('featured_event')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="language">Language</label>
                                    <input value="{{ old('language') }}" type="text" class="form-control @error('language') is-invalid @enderror" id="language" name="language"  autocomplete="off">
                                     @error('language')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="foods">Foods</label>
                                    <input value="{{ old('foods') }}" type="text" class="form-control @error('foods') is-invalid @enderror" id="foods" name="foods" autocomplete="off">
                                     @error('foods')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="depature_date">Depature Date</label>
                                    <input value="{{ old('depature_date') }}" type="date" class="form-control @error('depature_date') is-invalid @enderror" id="depature_date" name="depature_date"  autocomplete="off">
                                     @error('depature_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="duration">Duration</label>
                                    <input value="{{ old('duration') }}" type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" autocomplete="off">
                                     @error('duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="type">Type</label>
                                    <input value="{{ old('type') }}" type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"  autocomplete="off">
                                     @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="price">Price</label>
                                    <input value="{{ old('price') }}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" autocomplete="off">
                                     @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bold" for="about">About</label>
                                <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about" cols="30" rows="5">{{ old('about') }}</textarea>
                                @error('about')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
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