@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Genres</h1>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('genres.create') }}" class="btn btn-success">Add Genre</a>
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <ul>
                <il>List of genres</il>
            </ul>
        </div>
    </div>
@endsection
