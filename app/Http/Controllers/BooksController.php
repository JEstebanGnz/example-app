<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class BooksController extends Controller
{
    public function index() {


        return Inertia::render('Books/Index');

    }

    //Esta es la ruta para realmente HACER el envio de la informacion nueva y crear el libro
    public function store(StoreBook $request){

        $book = new Book();

        $book->title = $request->title;
        $book->artist = $request->artist;
        $book->year = $request->year;

        $book->save();



    }

        //Forma alternativa de hacerlo, tambien sirve...
//        Book::create([
//
//            'title' => $request->title,
//            'artist' => $request->artist,
//            'year' => $request->year,
//
//        ]);




    //Esta es la ruta para traer todos los libros, es la ruta api/books
    public function getBooks(){

        return response()->json(['books' => Book::all()]);
    }



    //Esta es la ruta usada para mostrar la ruta donde esta el form para anadir un nuevo libro
    public function create(){


        return Inertia::render('Books/Create');

    }


    public function edit($id){

        $book = Book::find($id);

        return Inertia::render('Books/Edit',['book'=> $book]);

    }

    public function update(Request $request, $id){

        $book = Book::find($id);

        $book->title = $request->title;
        $book->artist = $request->artist;
        $book->year = $request->year;
        $book->save();

//        return redirect()-> route('books.index')->with('success', 'Libro actualizado');

    }


    public function destroy($id){

        $book = Book::find($id);

        $book->delete();


    }
}
