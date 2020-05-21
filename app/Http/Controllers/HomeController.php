<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

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
        $bookDataWithRate = DB::table('books')
        ->join('rates','books.id','=','rates.book_id')
        ->paginate(2);
        $bookFavourite = DB::table('books')
        ->join('favorites','books.id','=','favorites.book_id')
        ->paginate(2);
        $images= Book::pluck('image')->toArray();

         return view('home', ['book' => $bookDataWithRate , 'bookFav'=>$bookFavourite , 'category_data'=>Category::all(),'images'=>$images]);
    }
}
