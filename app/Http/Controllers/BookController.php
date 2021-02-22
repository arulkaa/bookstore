<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateBook;
use App\Http\Requests\Book\UpdateBook;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index')->with('books', Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBook $request)
    {
        $path = $request->file('cover')->store('covers', 'public');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $path
        ]);

        session()->flash('successGenre', 'Book created successfully.');

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.create')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBook $request, Book $book)
    {
        $data = $request->only(['title', 'description']);

        if ($request->hasFile('cover')) {
            $cover = $request->cover->store('books');

            Storage::delete($book->cover);

            $data['cover'] = $cover;
        }
            $book->update($data);

            session()->flash('successGenre', 'Book updated successfully.');

            return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::withTrashed()->where('id', $id)->firstOrFail();

        if ($book->trashed()) {

            Storage::delete($book->cover);

            $book->forceDelete();
        } else {
            $book->delete();
        }

        session()->flash('successGenre', 'Book deleted successfully.');

        return redirect()->route('books.index');
    }

    public function trashed()
    {
        $trashed = Book::onlyTrashed()->get();

        return view('books.index')->with('books', $trashed);
    }
}
