<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public static function getRecent(){
       $recent = Book::where("id", ">", 0)->limit(3)->orderBy('id', 'desc')->get();
       return $recent;
   }
}
