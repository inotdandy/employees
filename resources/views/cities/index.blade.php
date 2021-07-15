@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h2>{{ __('Cities') }}</h2>
                    </div>
                    <div>
                        <form class="d-flex" method="GET" action="{{ route('cities.index') }}">
                            <div  class="mr-2">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mb-3">Search</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('cities.create') }}">Create User</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">State</th>
                            <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                            <th scope="row">{{ $city->id }}</th>
                            <td>{{ $city->state->name }}</td>
                            <td>{{ $city->name }}</td>
                            <td><a href="{{ route('cities.edit', $city) }}" class="btn btn-sm btn-success">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection