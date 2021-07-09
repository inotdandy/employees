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
                        <h2>{{ __('Countries') }}</h2>
                    </div>
                    <div>
                        <form class="d-flex" method="GET" action="{{ route('countries.index') }}">
                            <div  class="mr-2">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mb-3">Search</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('countries.create') }}">Create User</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countries as $country)
                            <tr>
                            <th scope="row">{{ $country->id }}</th>
                            <td>{{ $country->zip_code }}</td>
                            <td>{{ $country->name }}</td>
                            <td><a href="{{ route('countries.edit', $country) }}" class="btn btn-sm btn-success">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection