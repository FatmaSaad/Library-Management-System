<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    static protected $index;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($book);
        $book = Book::find($id);
        $relatedBooks=$this->getSameCat($id);
        $comments=$book->comments;
        $rate=$book->rates()->where("user_id",Auth::id())->first()->rate;
        // dd($rate);
        ($relatedBooks);
        return view('books.show', array('book' => $book,'relatedBooks'=>$relatedBooks,'comments'=>$comments,"rate"=>$rate));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSameCat($id)
    {   self::$index+=4;
        $categoryid=Book::find($id)->category->id;
        try {
            $otherRelatedBooks=Book::where('category_id',$categoryid)->limit(4)->offset(self::$index-4)->get();
            // self::$index=self::$index+4;
            if(self::$index==4){
                 return $otherRelatedBooks;
            }
            else{
                dd(self::$index);
                // return response()->json(['otherRelatedBooks'=>$otherRelatedBooks,"alaa"=>"alaa"]);
        }
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }

}
