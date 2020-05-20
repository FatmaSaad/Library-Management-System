@extends('admin.layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                Categories
                <span class="float-right">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-success">New Category</a>
                </span>
            </div>

        <div class="m-portlet__body">
            @include('admin.categories._table')
        </div>
    </div>
</div>
</div>
</div>
@endsection

