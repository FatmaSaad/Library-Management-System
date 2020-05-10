<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use App\Book;
use App\Rate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $bookData = Book::all();
        // $booksrate = $bookData->join('rates','books.id','=','rates.book_id');
        
        $bookDataWithRate = DB::table('books')->join('rates','books.id','=','rates.book_id')->get();
        $bookFavourite = DB::table('books')->join('favorites','books.id','=','favorites.book_id')->get();
         return view('home', ['book' => $bookDataWithRate , 'bookFav'=>$bookFavourite]);
    }

   
}
