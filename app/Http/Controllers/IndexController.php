<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller {

    public static function getMain() {
        return view('main');
    }

    public static function getRecent(int $page=0) {
        //$page   = (!is_null($request)) ? $request->all("page") :  0;

       // dd($request->all("page") );

        $num    = 10;
        $offset = $page * $num;
        $recent = Book::where("id", ">", 0)->limit($num)->offset($offset)->orderBy('id', 'desc')->get();
        return $recent;
    }
}
