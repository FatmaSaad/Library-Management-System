@extends('layouts.app')

@section('content')

<div class="container-fluid">
    

            <!-- <div class="row">

                    <div class="col-lg-5">
                    <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
                    </form>
                    </div>
                    <div class="col-lg-5">

                       
                    </div>
            </div> -->


           <div class="row">
                <div class="col-lg-2 mt-5">

                <ul class="list-group">
                        <li class="list-group-item"><a href="{{ url('/api/book/{Book}') }}">Arts</a></li>
                        <li class="list-group-item"><a href="{{ url('/api/book/{Book}') }}">Music</a></li>
                        <li class="list-group-item"><a href="{{ url('/api/book/{Book}') }}">Kids</a></li>
                        <li class="list-group-item"><a href="{{ url('/api/book/{Book}') }}">Business</a></li>
                        <li class="list-group-item"><a href="{{ url('/api/book/{Book}') }}">Computers</a></li>
                </ul>

                </div>

                @foreach($book as $item)
                <div class="col-lg-3 mt-5">
               
                    <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src={{$item->image}} alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title">{{$item->name}}</h2>
                                    <p class="card-text">{{$item->description}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @if($item->quantity == 0)
                                    <li class="list-group-item"><span class="badge badge-danger p-2">No Copies Available</span></li>
                                    @else
                                    <li class="list-group-item">{{$item->quantity}} copies Available</li>
                                    @endif

                                    
                                    <li class="list-group-item">Rate -- {{$item->rate}}</li>
                                    
                                    @foreach($bookFav as $itemFav)
                                    <li class="list-group-item">Favourite -- {{$itemFav->book_id}} -- user {{$itemFav->user_id}}</li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <button class="btn btn-success btn-block" href="#">Lease</a>
                                   
                                </div>
                    </div>
                
                </div>
                @endforeach


           <div>
</div>
@endsection
