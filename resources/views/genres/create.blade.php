@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Add Genre</h1>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Write new genre">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Add Genre</button>
                </div>
            </form>
        </div>
    </div>
@endsection
