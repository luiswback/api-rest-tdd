<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BooksStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    /**
     * @var Book
     */
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        return response()->json($this->book->all());
    }

    public function show($id)
    {
        $book = $this->book->find($id);
        return response()->json($book);
    }

    public function store(BooksStoreRequest $request)
    {
        $book = $this->book->create($request->all());

        return response()->json($book, 201);
    }

    public function update($id, Request $request)
    {
        $book = $this->book->find($id);
        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = $this->book->find($id);
        $book->delete();

        return response()->json([], 204);
    }
}
