<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function get(){

        return view("search");

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){

        $author = $request->input("author");
        $title = $request->input("title");

        $result = [];
        $result = Book::where('title', 'LIKE', "%{$title}%")
            ->where('author_name', 'LIKE', "%{$author}%")
            ->get();

        //dd([$title, $author]);
        return view("search")->with("result", $result);

    }
}
