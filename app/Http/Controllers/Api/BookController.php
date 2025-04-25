<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @response 200 {
     *   "data": [
     *     {"id": 1, "name": "Harry Potter", "author": "J.K. Rowling", "title": "Philosopher's Stone"}
     *   ]
     * }
     */
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Store a new book.
     *
     * @bodyParam name string required The name of the book.
     * @bodyParam author string required The author's name.
     * @bodyParam title string required The book's title.
     *
     * @response 201 {"message": "Book created successfully"}
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'name' => 'required|integer',
        ]);

        $book = Book::create($data);
        return new BookResource($book);
    }
    /**
     * Show a single book.
     *
     * @urlParam id integer required The ID of the book.
     *
     * @response 200 {"id": 1, "name": "Harry Potter", "author": "J.K. Rowling", "title": "Philosopher's Stone"}
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update a book.
     *
     * @urlParam id integer required The ID of the book.
     * @bodyParam name string The name of the book.
     * @bodyParam author string The author's name.
     * @bodyParam title string The book's title.
     *
     * @response 200 {"message": "Book updated successfully"}
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'sometimes|required',
            'author' => 'sometimes|required',
            'name' => 'sometimes|required|integer',
        ]);

        $book->update($data);
        return new BookResource($book);
    }
    /**
     * Delete a book.
     *
     * @urlParam id integer required The ID of the book.
     *
     * @response 204 {}
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Deleted'], 204);
    }
}