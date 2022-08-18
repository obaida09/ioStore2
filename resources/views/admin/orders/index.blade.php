@extends('admin.layouts.admin')
@section('admin-content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-2 font-weight-bold text-primary">{{ isset($title)?$title: 'Admin' }}</h6>
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