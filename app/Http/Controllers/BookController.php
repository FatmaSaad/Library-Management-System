<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view ('ajax_search.ajax');


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

     $cat = Category::find($id);

       $cat_book = DB::table('books')
       ->join('categories','books.category_id','=','categories.id')
       ->where('books.category_id','=',$cat->id)
       ->get();
        return view('category_pages.category',['categoey_item'=>$cat_book]);

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
