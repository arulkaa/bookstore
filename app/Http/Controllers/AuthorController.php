<?php

namespace App\Http\Controllers;

use App\Http\Requests\author\UpdateAuthor;
use App\Http\Requests\author\CreateAuthor;
use App\Models\Author;

class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('name', 'asc')->get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuthor $request)
    {
        Author::create([
            'name' => $request->name
        ]);

        session()->flash('succesGenre', 'Author created successfully.');

        return redirect(route('authors.index'));
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
    public function edit(Author $author)
    {
        return view('authors.create')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthor $request, Author $author)
    {
        $author->update([
            'name' => $request->name
        ]);

        session()->flash('succesGenre', 'Author updated successfully.');

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        session()->flash('succesGenre', 'Author deleted successfully.');

        return redirect(route('authors.index'));
    }
}
