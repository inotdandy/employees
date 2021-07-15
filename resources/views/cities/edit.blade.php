@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h2>{{ __('Edit State') }}</h2>
                    </div>
                    <div>
                        <a href="{{route('cities.index')}}" class="btn btn-dark">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update', $city) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control" aria-label="Default select example" name="state_id">
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" {{ $city->state->id != $state->id ? '' : 'selected'}}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                
                                @error('state_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

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
                                    {{ __('Update City') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('cities.destroy', $city) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete {{ $city->name }}</button>
            </form>
        </div>
    </div>
@endsection