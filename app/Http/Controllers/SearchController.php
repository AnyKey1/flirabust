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

        //dd(($request->route()->parameters));



        $author = $request->input("author");
        $title = $request->input("title");
        $category = $request->route()->parameters["category"] ?? null;
        $serie = $request->route()->parameters["serie_name"] ?? null;
        $tag = $request->input("tag_name");

        //dd($category);
        $result = [];
        $view = "search";
        $result = Book::where("id", ">", "0");
        if($author){
            $result->where('author_name', 'LIKE', "%{$author}%");
        }

        if($title){
            $result->where('title', 'LIKE', "%{$title}%");
        }
        if($tag){
            $result->where('tags', 'LIKE', "%{$tag}%");
        }
        if($category){
           $result->where('category', 'LIKE', "%{$category}%");
           //$view = "book";
        }
        if($serie){
           $result->where('serie', 'LIKE', "%{$serie}%");
            //$view = "book";
        }

        $result->limit(10);
        //dd($result);
        $result = $result->get();

        //dd($category);

        return view($view)->with("result", $result);

    }
}
