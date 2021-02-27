@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>{{ isset($author) ? 'Edit Author' : 'Add New Author' }}</h1>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($author) ? route('authors.update', $author->id) : route('authors.store') }}"
                  method="post">
                @csrf
                @if(isset($author))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Write new Author"
                           value="{{ isset($author) ? $author->name : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">{{ isset($author) ? 'Update Author' : 'Add Author' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
