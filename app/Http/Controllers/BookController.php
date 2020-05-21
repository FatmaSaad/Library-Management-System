<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Book;
use App\models\Category;

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
        return view ('books.ajax');
    }

    public function show($id)
    {
        // dd($book);
        try {
            $book = Book::find($id);
            if($book){
                $relatedBooks=$this->getSameCat($id);
                $comments=$book->comments;
                $averageRate=optional($book->rates())->avg('rate');
                $rate=optional($book->rates()->where("user_id",Auth::id())->first())->rate;
                return view('books.show', array('book' => $book,'relatedBooks'=>$relatedBooks,'comments'=>$comments,"rate"=>$rate, "averageRate" =>$averageRate));
            }
            else{
                return abort(404);
            }    
            }
        catch (Throwable $e) {
                report($e);
                return false;
        }

    }

    public function BooksByCategory($id)
    {

     $cat = Category::find($id);

       $cat_book = DB::table('books')
       ->join('categories','books.category_id','=','categories.id')
       ->where('books.category_id','=',$cat->id)
       ->get();
        return view('Books.category',['categoey_item'=>$cat_book,'category_data'=>\App\models\Category::all()]);

    }

    public function getSameCat($id)
    {   self::$index+=4;
        if(Book::find($id)){
            $categoryid=Book::find($id)->category->id;
        }else{
            $categoryid=false;
        }
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
    public function search(Request $request)
    {       
            if($request->ajax())
            {
                $output="";
                $search_books = DB::table('books')
                ->where('name','LIKE','%'.$request->search.'%')
                ->orWhere('auther','LIKE','%'.$request->search.'%')
                ->get();
                if($search_books){

                    foreach($search_books as $itemOfSearch)
                        {
                                    $output.='<div class="card-body">'.
                                    '<h3 class="card-title">'.$itemOfSearch->name.'</h3>'.
                                    '<h6 class="card-title">'.$itemOfSearch->auther.'</h6>'.
                                    '<p class="card-text">'.$itemOfSearch->description.'</p>'.
                                    '<span class="badge badge-default">'.$itemOfSearch->quantity."-- Copies Available".'</span>'.
                                    '<button class="btn btn-success">'."Lease".'</button>'.
                                    '</div>'.'<br>';
                        }

                        return Response($output);
                }
            }

    }
}
