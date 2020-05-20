@extends('layouts.app')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">
@section('content')
<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4">{{$book->name}}
    <small>Author:{{$book->auther}}</small>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-4">
      <img class="img-fluid" src="http://placehold.it/750x500" alt="">
    </div>

    <div class="col-md-4">

      <h4>{{$book->description}}</h4>
      <h3 class="my-3">Book Details</h3>
      <ul>
        <li> It costs{{$book->price}} EGP</li>
        <li id="quantity"> {{$book->quantity}} Copies available</li>
      </ul>
      <!-- lease input-->
        <!-- Button trigger modal -->
          <button style="margin-top:10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Lease
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">How many dayes will you lease this book for?!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <table>
                               <tr>
                                   <td> <label for="from" >From</label> </td>
                                   <td> <input id="from"  type="date" min="now"/> </td>

                               </tr>
                               <tr>
                                   <td> <label for="to" >To</label> </td>
                                   <td> <input id="to"  type="date" min="now"/> </td>

                               </tr>
                           </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="lease()" data-dismiss="modal"> lease</button>
                      </div>
                    </div>
                  </div>
                </div>

                </div>

    <div class="col-md-4">
      <h1 id="love" style="color:gray;" onclick="updateFavorite()" class="btn">&#x2764;</h1>
        <!-- Rate Widget -->
        <div class="card ">
          <h5 class="card-header">Rate</h5>
          <div class="card-body">
            <div >
                <div class="form-group">
                    <input type="number" id="rating-control" class="form-control" step="1" min="1" max="5" placeholder="Rate 1 - 5" >
                </div>
                <div id="stars-outer">
                    <div id="stars-inner"></div>
                </div>
                <span class="number-rating"></span>
            </div>
          </div>
        </div>

   </div>
</div>
  <!-- /.row -->
  <br/>
<div class="row">
  <div class="container">

            <div class="card">
              <label for="addComment" class="card-header">Comment</label>
                <div class="card-body col-sm-10">
                <textarea class="form-control card-body" name="addComment" id="addComment" rows="5"></textarea>
                </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div style="display: none" id="book">{{$book->id}}!{{ csrf_token() }}!{{$rate}}</div>
                    <button class="btn btn-success btn-circle text-uppercase" id="submitComment" ><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                </div>
              </div>
            </div>
      </div>
    </div>
    </div>
</br>
</br>

      <div class="container" id="comments">
       @if($comments)
       @foreach($comments as $comment)
        <div class="card">
          <div class="card-header">
            <h5 class="mt-0">{{$comment->user->name}} </h5>
          </div>
          <div class="card-body">{{ $comment->body }}</div>
        </div>
        </br>
        @endforeach
        @endif
      </div>


  <!-- Related Projects Row -->
<div class="container">
  <h3 class="my-4">Related Projects</h3>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="d-flex flex-row">
          @if($relatedBooks)
          @foreach ($relatedBooks as $book)
          @if($loop->index < 4)
          <div class="col-md-3 col-sm-6 mb-4 p-2">
            <a href="#">
              <div class="card">
                <img class="card-img-top" src="http://placehold.it/500x300" alt="">
                <div class="card-body">
                  <h4 class="card-title">{{$book->title}}</h4>
                  <p class="card-text">{{$book->description}}</p>
                </div>
              </div>
            </a>
          </div>
          @endif
          @endforeach
        @endif
        </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" id="next" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  </div>
  </div>
  <!-- /.row -->

<!-- carasoul -->



<!-- /.container -->
@endsection
<script src="{{ asset('js/book.js') }}" defer></script>
