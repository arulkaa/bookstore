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
            @if($books->count()>0)
                <table class="table">
                    <thead>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$book->cover) }}" class="thumbnail"
                                     alt="{{ $book->title }}">
                            </td>
                            <td>
                                {{ $book->title }}
                            </td>
                            <td>
                                {{ $book->author }}
                            </td>
                            <td>
                                <a href="{{ route('genres.edit', $book->genre->id) }}" title="Edit Genre">
                                    {{ $book->genre->name }}
                                </a>
                            </td>
                            @if($book->trashed())
                                <form action="{{ route('restore-books', $book->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <td>
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </td>
                                </form>
                            @else
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            @endif
                            <td>
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $book->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No Books Yet</p>
            @endif
        </div>
    </div>
@endsection
