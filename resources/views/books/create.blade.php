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
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control-file" name="cover" id="cover">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
