@extends('admin.layouts.app')
@section('title') All Books
@endsection

@section('header')
@endsection

@section('breadcrumb') @php($breadcrumbs=[' Books'=>route('admin.books.index'),])
@includeWhen(isset($breadcrumbs),'admin.layouts._breadcrumb', ['breadcrumbs' =>$breadcrumbs ])
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                Books
                <span class="float-right">
                    <a href="{{ route('admin.books.create') }}" class="btn btn-sm btn-success">New Book</a>
                </span>
            </div>

        <div class="m-portlet__body">
            @include('admin.books._table')
        </div>
    </div>
</div>
</div>
</div>
@endsection
