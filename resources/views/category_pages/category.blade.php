@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
<div class="row">
                @foreach($categoey_item as $item)
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

                                
                                </ul>
                                <div class="card-body">
                                    <button class="btn btn-success btn-block" href="#">Lease</a>
                                   
                                </div>
                    </div>
                
                </div>
                @endforeach
</div>

           <div>
</div>
@endsection
