<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Rate;

class RateController extends Controller
{
    function store(Request $request){
        $flight = Rate::updateOrCreate(
            ['book_id' => $request->book,'user_id' => Auth::id()],
            ['rate' =>$request->rate ]
        );
    }
}
