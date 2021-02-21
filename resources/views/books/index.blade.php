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
            <table class="table">
                <thead>
                <th>Cover</th>
                <th>Title</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$book->cover) }}" class="thumbnail" alt="{{ $book->title }}">
                        </td>
                        <td>
                            {{ $book->title }}
                        </td>
                        <td>
                            <a href="" class="btn btn-outline-info btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-outline-danger btn-sm">Trash</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
