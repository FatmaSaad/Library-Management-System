<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;


class FavoriteController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
    
                $fav = Favorite::firstOrNew(['user_id'=>Auth::id(),'book_id'=>$request->book]);
                if($fav->exists()){
                   Favorite::where('user_id',Auth::id())->where('book_id',$request->book)->delete();
                   return response()->json(["like"=>"no"]);
                }
                else
                {    
                    $fav->save();
                    return response()->json(["like"=>"yes"]);
                }
                
            
    
    
}
}