@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Books</h1>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <p>kas nors</p>
        </div>
    </div>
@endsection
