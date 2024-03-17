<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = Book::all();
            return response()->json($books, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al recuperar libros de la base de datos.'], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);
    
        try {
            $user = Auth::user();
    
            if (!$user) {
                return response()->json(['message' => 'No autorizado'], 401);
            }
    
            $book = new Book();
            $book->title = $request->title;
            $book->author = $request->author;
    
            $user->books()->save($book);
    
            return response()->json(['message' => 'El libro se ha creado correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el libro'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    try {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->save();

        return response()->json(['message' => 'El libro se ha actualizado correctamente'], 200);

    } catch (ModelNotFoundException $e) {
        return response()->json(['message' => 'Libro no encontrado'], 404);

    } catch (\Exception $e) {
        // Devuelve el mensaje de error específico
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
    
            return response()->json(['message' => 'El libro se ha eliminado correctamente'], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Libro no encontrado'], 404);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el libro'], 500);
        }
    }
}
