@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>

        <div class="list-group">
            @forelse($category_data as $cat_name)
                <a href="{{ route('books by category' , [$cat_name->id]) }}"
                    class="list-group-item">{{$cat_name->name}}</a>
             @empty
                <div class="alert alert-info"> no books with that category</div>
            @endforelse
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">


                @foreach($categoey_item as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a><img src="{!! asset($item->image )!!}" width="250" height="150"></a>

                        <div class="card-body">
                            <h4 class="card-title">
                            <a href="#">{{$item->name}}</a>
                            </h4>
                            <h5>${{$item->price}}</h5>
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

                            {{-- @foreach($bookFav as $itemFav)
                                <li class="list-group-item">Favourite
                                    <span style="margin-left:20px">
                                    </span>
                                    <i class="fa fa-heart fa-lg" ></i>
                                </li>
                            @endforeach --}}
                        </ul>
                            <div class="card-body">
                                <button class="btn btn-success btn-block" href="#">Lease</a>

                            </div>
                        </div>

                    </div>
                @endforeach



            </div>
            <!-- /.row -->
            {{-- <div class='col-lg-6 ml-5'>
                {{ $book->links() }}
            </div> --}}
          </div>
          <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

      <!-- Footer -->


      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
    @endsection
