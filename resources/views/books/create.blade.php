@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>{{{ isset($book) ? 'Edit Book' : 'Add New Book' }}}</h1>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf

                @if(isset($book))
                    @method('put')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                    value="{{{ isset($book) ? $book->title : '' }}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                    class="form-control">{{ isset($book) ? $book->description : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>Authors</label>
                    @foreach ($authors as $author)
                        <div class="form-check">
                            <input type="checkbox" name="author[]" id="author" class="form-check-input"
                            value="{{ $author->id }}"
                                @if(in_array($author->id, $book->$author->toArray()))
                                    selected
                                    @endif
                            >
                            </input>
                            <label class="form-check-label" for="author">
                                {{ $author->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre" class="form-control">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"
                                @if (isset($book))
                                    @if($genre->id == $book->genre_id)
                                        selected
                                    @endif
                                @endif
                            >
                                {{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if(isset($book))
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}">
                    </div>
                @endif
                <div class="form-group">
                    <label for="cover">{{ isset($book) ? 'Change Cover' : 'Add Cover'}}</label>
                    <input type="file" class="form-control-file" name="cover" id="cover">
                </div>
                <div class="form-group">
                    <button class="btn btn-success"
                            type="submit">{{ isset($book) ? 'Update Book' : 'Add Book' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
