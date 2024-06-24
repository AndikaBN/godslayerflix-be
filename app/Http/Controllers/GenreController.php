<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //index
    public function index(){
        $genres = Genre::paginate(10);
        return view('pages.genre.index', compact('genres'));
    }

    //create
    public function create(){
        return view('pages.genre.create');
    }

    //store
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre created successfully');
    }

    //edit
    public function edit($id){
        $genre = Genre::find($id);
        return view('pages.genre.edit', compact('genre'));
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required'
        ]);

        $genre = Genre::find($id);
        $genre->update($request->all());
        return redirect()->route('genres.index');
    }

    //destroy
    public function destroy($id){
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genres.index');
    }

    //show
    public function show($id){
        $genre = Genre::find($id);
        return view('pages.genre.show', compact('genre'));
    }
}
