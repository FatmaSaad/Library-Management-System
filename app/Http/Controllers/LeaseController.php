<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Lease;
use Illuminate\Support\Facades\Auth;


class LeaseController extends Controller
{
    public function store(Request $request)
    {
        $lease=Lease::create(["user_id"=>Auth::id(),"book_id"=>$request->book,"from"=>$request->from,"to"=>$request->to]);
        $newQuantity=$lease->book->quantity-1;
        $lease->book()->update(['quantity' => $newQuantity]);
        return response()->json($lease);
    }
}
