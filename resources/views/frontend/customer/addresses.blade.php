@extends('layouts.app')
@section('content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">{{ auth()->user()->username }}- Addresses</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('frontend.customer.addresses') }}">Addresses</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">

        <div class="row">
            <div class="col-lg-8">
                <div class="row py-lg-4 align-items-center bg-light ms-1">
                    <h2 class="col-8 h5 text-uppercase mt-3">Addresses</h2>
                    <div class="col-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm fl-r" id="reset" data-toggle="modal"
                            data-target="#modalCreate">
                            Add address
                        </button>
                    </div>
                </div>
                <div class="my-4 ms-1">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Address title</th>
                                    <th>Default</th>
                                    <th class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($addresses as $address)
                                <tr>
                                    <td>{{ $address->address_title }}</td>
                                    <td>{{ $address->defaultAddress() }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm">
                                            {{-- <a class="btn btn-warning"
                                                data-route="{{ route('frontend.customer.address.update', $address->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a> --}}

                                            <!-- button Edit -->
                                            <a class="btn"
                                                onclick="getData('{{ route('frontend.customer.address.edit', $address->id)}}' , '{{ route('frontend.customer.address.update', $address->id) }}')"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalUpdate">
                                                <i class="fas fa-user-edit" aria-hidden="true"></i>
                                            </a>

                                            <!-- button modal delete -->
                                            <a onclick="addRoute('{{ route('frontend.customer.address.delete', $address->id) }}')"
                                                class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">No addresses found</td>
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

    <!-- Modal Create Address -->
    <div class="modal fade modalCreate" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close btn-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-4">
                    <form data-route="{{  route('frontend.customer.address.create') }}" id="createAddress">
                        <div class="row">

                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="address_title">Address title</label>
                                <input class="form-control" name="address_title" type="text"
                                    placeholder="Enter your address title">
                                <span id="address_title_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="first_name">First name</label>
                                <input class="form-control form-control-lg" name="first_name" type="text"
                                    placeholder="Enter your first name">
                                <span id="first_name_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="last_name">Last name</label>
                                <input class="form-control form-control-lg" name="last_name" type="text"
                                    placeholder="Enter your last name">
                                <span id="last_name_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="email">Email address</label>
                                <input class="form-control form-control-lg" name="email" type="email"
                                    placeholder="e.g. Jason@example.com">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="mobile">Mobile number</label>
                                <input class="form-control form-control-lg" name="mobile" type="tel"
                                    placeholder="e.g. 966512345678">
                                <span id="mobile_error" class="text-danger"></span>
                            </div>

                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="address">address</label>
                                <input class="form-control form-control-lg" name="address" type="text"
                                    placeholder="Enter your first name">
                                <span id="address_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="address2">address2</label>
                                <input class="form-control form-control-lg" name="address2" type="text"
                                    placeholder="Enter your last name">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="country_id">Country</label>
                                <select class="form-control form-control-lg" name="country_id">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id')==$country->id ? 'selected' :
                                        null }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <span id="country_id_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="state_id">State</label>
                                <select class="form-control form-control-lg" name="state_id">
                                    <option value="1">Select State</option>
                                </select>
                                <span id="state_id_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="city_id">City</label>
                                <select class="form-control form-control-lg" name="city_id">
                                    <option value="1">Select City</option>
                                </select>
                                <span id="city_id_error" class="text-danger"></span>
                            </div>

                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="zip_code">ZIP Code</label>
                                <input class="form-control form-control-lg" name="zip_code" type="text"
                                    placeholder="Enter your first name">
                                <span id="zip_code_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-4">
                                <label class="text-small text-uppercase mb-1" for="po_box">P.O.Box</label>
                                <input class="form-control form-control-lg" name="po_box" type="text"
                                    placeholder="Enter your last name">
                                <span id="po_box_error" class="text-danger"></span>
                            </div>
                            <div class="col-lg-12form-group mt-0">
                                <label class="text-small text-uppercase mb-1">&nbsp;</label>
                                <div class="form-check">
                                    <input class="form-check-input" id="default_address" name="default_address"
                                        type="checkbox">
                                    <label class="form-check-label" for="default_address">Default address?</label>
                                </div>
                            </div>

                            <div class="col-lg-12 form-group mt-4 mb-4">
                                <button class="btn btn-dark  w-100" id="reset" type="submit">
                                    Create address
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update Address -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="updateAddress">
                    <div class="row">

                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="address_title">Address title</label>
                            <input class="form-control" name="address_title" type="text"
                                placeholder="Enter your address title">
                            <span id="address_title_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="first_name">First name</label>
                            <input class="form-control form-control-lg" name="first_name" type="text"
                                placeholder="Enter your first name">
                            <span id="first_name_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="last_name">Last name</label>
                            <input class="form-control form-control-lg" name="last_name" type="text"
                                placeholder="Enter your last name">
                            <span id="last_name_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="email">Email address</label>
                            <input class="form-control form-control-lg" name="email" type="email"
                                placeholder="e.g. Jason@example.com">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="mobile">Mobile number</label>
                            <input class="form-control form-control-lg" name="mobile" type="tel"
                                placeholder="e.g. 966512345678">
                            <span id="mobile_error" class="text-danger"></span>
                        </div>

                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="address">address</label>
                            <input class="form-control form-control-lg" name="address" type="text"
                                placeholder="Enter your first name">
                            <span id="address_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="address2">address2</label>
                            <input class="form-control form-control-lg" name="address2" type="text"
                                placeholder="Enter your last name">
                            <span id="address2_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="country_id">Country</label>
                            <select class="form-control form-control-lg" name="country_id">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id')==$country->id ? 'selected' :
                                    null }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <span id="country_id_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="state_id">State</label>
                            <select class="form-control form-control-lg" name="state_id">
                                <option value="1">Select State</option>
                            </select>
                            <span id="state_id_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="city_id">City</label>
                            <select class="form-control form-control-lg" name="city_id">
                                <option value="1">Select City</option>
                            </select>
                            <span id="city_id_error" class="text-danger"></span>
                        </div>

                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="zip_code">ZIP Code</label>
                            <input class="form-control form-control-lg" name="zip_code" type="text"
                                placeholder="Enter your first name">
                            <span id="zip_code_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-4">
                            <label class="text-small text-uppercase mb-1" for="po_box">P.O.Box</label>
                            <input class="form-control form-control-lg" name="po_box" type="text"
                                placeholder="Enter your last name">
                            <span id="po_box_error" class="text-danger"></span>
                        </div>
                        <div class="col-lg-12form-group mt-0">
                            <label class="text-small text-uppercase mb-1">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" id="default_address" name="default_address"
                                    type="checkbox">
                                <label class="form-check-label" for="default_address">Default address?</label>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group mt-4 mb-4">
                            <button class="btn btn-dark w-100" type="submit">
                                Update address
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Delete Address -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal">Are you sure ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <div id="delete_address">
                    <a class="btn btn btn-dark">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>


@push('ajax')

<script>
    // Create Address
  $("#createAddress").submit(function(e) {
   e.preventDefault();
   var formData = $(this).serialize();
   var route = $(this).attr("data-route");

   $.ajax({
     type: "post"
     , headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     , url: route
     , data: formData
     , success: function(response) {
       jQuery.noConflict();
       location.reload();
     }
     , error: function(reject) {
       if (reject.status == 422) {
         var errors = $.parseJSON(reject.responseText).errors;
         $.each(errors, function(key, val) {
           $("#" + key + "_error").text(val[0]);
           console.log($("#" + key + "_error").text(val[0]))
         });
       }
     }
   , })
 })

 // Update Address

 function getData(route, updateRoute) {
    $('#updateAddress').attr('data-route', updateRoute)
    $.ajax({
      type: "get"
      , url: route
      , dataType: "JSON"
      , success: function(data) {
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
            $("input[name=" + key + " ]").val(data[key])
          }
        }

        // Select Country for This column 
        $('.form-control option').each(function() {
          if (data.country_id == $(this).val()) {
            $(this).attr('selected', 'selected');
          }
        });
      }
    , })
  }

 $("#updateAddress").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    var route = $(this).attr("data-route");
    $.ajax({
      url: route
      , type: "PUT"
      , headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      , data: formData
      , success: function(response) {
          jQuery.noConflict();
          location.reload();
        }
      , error: function(reject) {
          if (reject.status === 422) {
            var errors = $.parseJSON(reject.responseText).errors;
            console.log(errors)
            $.each(errors, function(key, val) {
              $("#" + key + "_error").text(val[0]);
            });
          }
        }
    })
  })


  // Delete Address
 function addRoute(route) {
    $('#delete_address').attr('data-route', route)
  }
  $("#delete_address").click(function(e) {
    var route = $(this).attr("data-route");
    $.ajax({
      url: route
      , type: "delete"
      , headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      , success: function(response) {
          jQuery.noConflict();
          location.reload();
      }
    })
  })

</script>


@endsection