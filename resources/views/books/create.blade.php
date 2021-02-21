@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Add New Book</h1>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control-file" name="cover" id="cover">
                    @if ($errors->has('cover'))
                        <span class="text-danger">{{ $errors->first('cover') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
