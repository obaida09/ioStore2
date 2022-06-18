@extends('admin.layouts.admin')
@section('admin-content')

@if ($message = Session::get('message'))
<div class="alert alert-success" id="successMessage" role="alert">
    {{ $message }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-2 font-weight-bold text-primary">{{ isset($title)?$title: 'Admin' }}</h6>
        <div class="ml-auto">
            <a href="{{ route('admin.customers.create') }}" class="btn btn-primary btn-sm">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Add new Customer</span>
            </a>
        </div>
    </div>


    <div class="card-body pt-0">
        <div class="table-responsive">
            {!! $dataTable->table(['class' => 'table table-bordered dataTable'], true) !!}
        </div>
    </div>
</div>

@push('js')
{!! $dataTable->scripts() !!}
@endpush


@endsection