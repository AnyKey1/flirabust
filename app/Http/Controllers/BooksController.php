<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id)
    {
        $book = Book::findOrFail($id);
        return view('book', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        //
    }

    /**
     *
     *
     * @param integer $bookId
     * @return Response
     */
    public function download(int $id)
    {
        $book = Book::find($id);

        if (Book::extractFile($book->file_id)) {
            $content = file_get_contents(storage_path() . "/app/public/{$book->file_id}.fb2");
        } else {
            return response("", 404);
        }

        return response($content)
            ->withHeaders([
                'Content-Type' => 'application/xml',
                "Content-length" => strlen($content),
                "Content-disposition" => "attachment; filename=\"{$book->title}.fb2\"",
            ]);
    }
}
