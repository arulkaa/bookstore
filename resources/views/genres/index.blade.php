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
            @if($genres->count() > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($genres as $genre)
                        <tr>
                            <td>
                                {{ $genre->name }}
                            </td>
                            <td>
                                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $genre->id }})">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="post" id="deleteGenreForm">
                            @csrf
                            @method('delete')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Genre</h5>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Are You Sure?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel
                                    </button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-center">Not Genre Yet</p>
            @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            let form = document.getElementById('deleteGenreForm')
            form.action = '/genres/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection

