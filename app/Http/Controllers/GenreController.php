<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\UpdateGenre;
use App\Http\Requests\Genre\CreateGenre;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy('name', 'asc')->get();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGenre $request)
    {
        Genre::create([
            'name' => $request->name
        ]);

        session()->flash('successGenre', 'Genre created successfully.');

        return redirect(route('genres.index'));
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
    public function edit(Genre $genre)
    {
        return view('genres.create')->with('genre', $genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenre $request, Genre $genre)
    {
        $genre->update([
            'name' => $request->name
        ]);

        session()->flash('successGenre', 'Genre updated successfully.');

        return redirect(route('genres.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        session()->flash('successGenre', 'Genre deleted successfully.');

        return redirect(route('genres.index'));
    }
}
