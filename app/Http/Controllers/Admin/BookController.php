<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Http\Requests\bookRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{ public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
    // {dd($request);
        $requests=$request->except('date','image');
        $requests['date']=Carbon::parse($request->date);

        $file = $request->file('image');
        $destination_path = 'images/';
        $profileImage = date("Ymd").".".$file->getClientOriginalName();
        $file->move($destination_path, $profileImage);
        $requests['image'] = $destination_path . $profileImage;

        // dd($requests);
        $Book = Book::create($requests);
        // toast('done', 'success', 'top-right');
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);



        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $requests=$request->except('date','image');
        $requests['date']=Carbon::parse($request->date);
        $file = $request->file('image');
        $destination_path = 'images/';
        $profileImage = date("Ymd").".".$file->getClientOriginalName();
        $file->move($destination_path, $profileImage);
        $requests['image'] = $destination_path . $profileImage;
        $Book = Book::findOrFail($id)->fill($requests);
        $Book->save();
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return back();

    }
}
