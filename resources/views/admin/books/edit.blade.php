@extends('multiauth::layouts.app')
@section('title') Edit Books
@endsection

@section('header')
@endsection

@section('breadcrumb')
    @php($breadcrumbs=['Books'=>route('home'),'Edit'=>route('books.edit',$book->id)])
    @includeWhen(isset($breadcrumbs),'admin.layouts._breadcrumb',
['breadcrumbs' =>$breadcrumbs ])
@endsection

@section('content')


    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                                <h3 class="m-portlet__head-text">
                                   Edit Book
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->

                    {!! Form::model($book,['method'=>'put','route'=>['books.update',$book->id],'files'=>'true','class'=>'m-form m-form--fit m-form--label-align-right'])!!}
                    @include('admin.books._form')

                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                {!!Form::close()!!}
                <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
