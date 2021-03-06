@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>{{ isset($genre) ? 'Edit Genre' : 'Add New Genre' }}</h1>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($genre) ? route('genres.update', $genre->id) : route('genres.store') }}"
                  method="post">
                @csrf
                @if(isset($genre))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Write new genre"
                           value="{{ isset($genre) ? $genre->name : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">{{ isset($genre) ? 'Update Genre' : 'Add Genre' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
