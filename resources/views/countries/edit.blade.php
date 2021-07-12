@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h2>{{ __('Edit Country') }}</h2>
                    </div>
                    <div>
                        <a href="{{route('countries.index')}}" class="btn btn-dark">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('countries.update', $country) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code', $country->zip_code) }}" required autocomplete="name" autofocus>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $country->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Country') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('countries.destroy', $country) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete {{ $country->zip_code }}</button>
            </form>
        </div>
    </div>
@endsection