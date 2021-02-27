@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Authors</h1>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('authors.create') }}" class="btn btn-success">Add Author</a>
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            @if($authors->count() > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Books Count</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>
                                {{ $author->name }}
                            </td>
                            <td>
                                {{ $author->books->count() }}
                            </td>
                            <td>
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $author->id }})">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" id="deleteAuthorForm">
                            @csrf
                            @method('delete')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Author</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Are You Sure?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel
                                    </button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-center">Not author Yet</p>
            @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            let form = document.getElementById('deleteAuthorForm')
            form.action = '/authors/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection

