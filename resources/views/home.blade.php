@extends('layouts.app')

@section('content')

<div class="container-fluid">
    

          

           <div class="row">
                <div class="col-lg-2 mt-5">

                <ul class="list-group">
                    @forelse($category_data as $cat_name)
                        <li class="list-group-item"><a href="{{ route('cat_book' , [$cat_name->id]) }}">{{$cat_name->name}}</a></li>
                    @empty
                        <div class="alert alert-info"> no books with that category</div>
                    @endforelse
               </ul>

                </div>

                @foreach($book as $item)
                <div class="col-lg-3 mt-5 " id="booksList">
               
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

                                    
                                    <li class="list-group-item">Rate<span style="margin-left:20px"></span> 
                                    
                                    @for ($i = 0; $i < 5; $i++)
                                    <i class="fa fa-star fa-lg" ></i>
                                    @endfor
                                   
                                     
                                     </li>
                                    
                                    @foreach($bookFav as $itemFav)
                                    <li class="list-group-item">Favourite  <span style="margin-left:20px"></span> <i class="fa fa-heart fa-lg" ></i></li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <button class="btn btn-success btn-block" href="#">Lease</a>
                                   
                                </div>
                    </div>
                
                </div>
                @endforeach
           </div>

                <div class='col-lg-6 ml-5'>
                    {{ $book->links() }}
                </div>
          

</div>



@endsection 

