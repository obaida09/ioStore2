@extends('layouts.app')
@section('content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Orders</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">

        <div class="row">
            <div class="col-lg-8">
                {{--
                <livewire:frontend.customer.orders-component /> --}}

                <div class="my-4 ms-1">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Ref.</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->ref_id }}</td>
                                    <td> {{ $order->total }}</td>
                                    <td>{!! $order->statusWithLabel() !!}</td>
                                    <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm">
                                            <!-- button View -->
                                            <a class=""
                                                onclick="viewOrder('{{ route('frontend.customer.order.view', $order->id)}}')"
                                                data-bs-toggle="modal" data-bs-target="#modalView">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No addresses found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                @include('layouts.customer_sidebar')
            </div>
        </div>
    </section>

    <!-- Modal View Order -->
    <div class="modal fade mt-6" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="products">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    //  Order View
   function viewOrder(route) {
    $("#products tr").remove();
    $("#products div").remove();
      $.ajax({
        type: "get"
        , url: route
        , dataType: "JSON"
        , success: function(data) {
          for (var key in data) {
            if (data.hasOwnProperty(key)) {
              console.log(data[key]);
              for (var i=0; i < data[key].products.length; i++) {
                console.log(data[key].transactions)
                $("#products").append(
                  '<tr>' + 
                    '<td><a href="' + window.location.origin + '/product/' + data[key].products[i].slug + '">' + data[key].products[i].name + '</a></td>' +
                    '<td>' + data[key].products[i].price + '<span class="curency"> ' + data[key].currency + '</span></td>' +
                    '<td>' + data[key].products[i].pivot.quantity + '</td>' +
                    '<td>' + data[key].products[i].pivot.quantity * data[key].products[i].price + '<span class="curency"> ' + data[key].currency + '</span></td>' +
                  '</tr>'
                  );
              }
            }
          }
          $("#products").append(
            '<div class="mt-4">' + 
              '<p class="pr-4 mb-0">Total: ' + data[key].total + ' <span class="curency">' + data[key].currency + '</span></p>' +
            '</div>'
          )
        }
      , })
    }
  </script>
@endpush

@endsection