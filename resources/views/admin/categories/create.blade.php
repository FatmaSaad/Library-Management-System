@extends('admin.layouts.app')
@section('title') Add
@endsection

@section('header')
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Add New ategory</div>

                <div class="card-body">
                    <!--begin::Form-->

            {{ Form::open(['method'=>'post',
            'route'=>'admin.categories.store',
            'files'=>'true',
            'class'=>'m-form m-form--fit m-form--label-align-right'])}}
                  @include('admin.categories._form')

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
                {{ Form::close() }}
                <!--end::Form-->

            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@endsection
