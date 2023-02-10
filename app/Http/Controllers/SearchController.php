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
    public function search(?Request $request){

        //dd($request->input());

        if(count($request->input()) == 0){
            return view("search")->with("result", []);
        }

        $author = $request->input("author");
        $title = $request->input("title");

        $result = [];
        $result = Book::where("id", ">", "0");
        if($author){
            $result->where('author_name', 'LIKE', "%{$author}%");
        }

        if($title){
            $result->where('title', 'LIKE', "%{$title}%");
        }
        $result = $result->get();

        //dd([$title, $author]);
        return view("search")->with("result", $result);

    }
}
