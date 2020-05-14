@extends('layouts.app')

@section('content')

        <div class="container">

          
            <div class="row">

                    <div class="col-lg-6">

                            <form class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2 ml-5">
                            <input class="form-control form-control-lg mr-3 w-75" type="text" placeholder="Search by Name of Book Or Auther"
                                aria-label="Search" id="search"/>
                            
                            <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                            </form>
                                
                                                    
                    </div>



                       
            </div>
                   





            <div class="row mt-5 ml-5">

                <div class="col-lg-5">
                        <div class="card" style="width: 18rem;">
                        
                            <div class="card-body">
                            
                            </div>
                        </div>

                </div>

            </div> 
                                   
                               

                </div>


            </div>

            <script>

                    $('#search').on('keyup',function(){
                    $value=$(this).val();
                    $.ajax({
                        type : 'get',
                        url : '{{URL::to('search')}}',
                        data:{'search':$value},
                        success:function(data)
                        {
                            $('.card-body').html(data);
                        }
                    });

                    
                    })
            </script>

            <script type="text/javascript">
                    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            </script>


@endsection