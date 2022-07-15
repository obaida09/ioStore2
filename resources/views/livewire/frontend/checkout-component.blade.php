<div class="row">
    <div class="col-lg-8">
        <div class="bg-light pt-4 pb-5 ps-4">    
            <h2 class="h5 text-uppercase pb-4">shipping addresses</h2>
            <div class="row ms-3">
                @forelse($addresses as $address)
                    <div class="col-6 form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="address-{{ $address->id }}" class="form-check-input me-2 col-2" wire:model="customer_address_id" wire:click="updateShippingCompanies()" {{ intval($customer_address_id) == $address->id ? 'checked' : '' }} value="{{ $address->id }}">
                            <label for="address-{{ $address->id }}" class="custom-control-label text-small col-10">
                                <b>{{ $address->address_title }}  : </b>
                                <small>
                                    {{ $address->address }}
                                </small>
                                <div class='mt-3 small opacity-75'>
                                    {{ $address->country->name }} - {{ $address->state->name }} - {{ $address->city->name }}
                                </div>
                            </label>
                        </div>
                    </div>
                @empty
                    <p>No addresses found</p>
                    <a href="#">Add an address</a>
                @endforelse
            </div>
        </div>

        @if ($customer_address_id != 0)
                <div class="bg-light pt-4 pb-5 ps-4 mt-3"> 
                    <h2 class="h5 text-uppercase mb-4">shipping way</h2>
                    <div class="row ms-3">
                            @forelse($shipping_companies as $shipping_company)
                                <div class="col-6 form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="shipping-company-{{ $shipping_company->id }}" class="form-check-input me-2 col-2" wire:model="shipping_company_id" wire:click="updateShippingCost()" {{ intval($shipping_company_id) == $shipping_company->id ? 'checked' : '' }} value="{{ $shipping_company->id }}">
                                        <label for="shipping-company-{{ $shipping_company->id }}" class="custom-control-label text-small col-10">
                                            <b>{{ $shipping_company->name }}</b>
                                            <small>
                                                {{ $address->description }} - (${{ $shipping_company->cost }})
                                            </small>
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <p>No shipping companies found</p>
                            @endforelse
                    </div>
                </div>
        @endif

        @if ($customer_address_id != 0 && $shipping_company_id != 0)
            <div class="bg-light pt-4 pb-5 ps-4 mt-3"> 
                <h2 class="h5 text-uppercase mb-4">Payment way</h2>
                <div class="row ms-3">
                    @forelse($payment_methods as $payment_method)
                        <div class="col-6 form-group">
                            <div class="custom-control custom-radio">
                                <input
                                    type="radio"
                                    id="payment-method-{{ $payment_method->id }}"
                                    class="form-check-input me-2"
                                    wire:model="payment_method_id"
                                    wire:click="updatePaymentMethod()"
                                    {{ intval($payment_method_id) == $payment_method->id ? 'checked' : '' }}
                                    value="{{ $payment_method->id }}">
                                <label for="payment-method-{{ $payment_method->id }}" class="custom-control-label text-small">
                                    <b>{{ $payment_method->name }}</b>
                                </label>
                            </div>
                        </div>
                    @empty
                        <p>No payment way found</p>
                    @endforelse
                </div>
            </div>      
        @endif

        @if ($customer_address_id != 0 && $shipping_company_id != 0 && $payment_method_id != 0)
            @if (\Str::lower($payment_method_code) == 'ppex')
                <form action="{{ route('frontend.checkout.payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="customer_address_id" value="{{ old('customer_address_id', $customer_address_id) }}" class="form-control">
                    <input type="hidden" name="shipping_company_id" value="{{ old('shipping_company_id', $shipping_company_id) }}" class="form-control">
                    <input type="hidden" name="payment_method_id" value="{{ old('payment_method_id', $payment_method_id) }}" class="form-control">
                    <button type="submit" name="submit" class="btn btn-dark btn-sm btn-block mt-3 w-100">
                        Continue with PayPal
                    </button>
                </form>
            @endif
        @endif
    </div>

    <!-- ORDER SUMMARY-->
    <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
                <h5 class="text-uppercase mb-4">Your order</h5>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between">
                        <strong class="small font-weight-bold">Subtotal</strong>
                        <span class="text-muted small">${{ $cart_subtotal }}</span>
                    </li>
                    @if(session()->has('coupon'))
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="small font-weight-bold">Discount <small>({{ getNumbers()->get('discount_code') }})</small></strong>
                            <span class="text-muted small">- ${{ $cart_discount }}</span>
                        </li>
                    @endif
                    @if(session()->has('shipping'))
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="small font-weight-bold">Shipping <small>({{ getNumbers()->get('shipping_code') }})</small></strong>
                            <span class="text-muted small">${{ $cart_shipping }}</span>
                        </li>
                    @endif
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between">
                        <strong class="small font-weight-bold">Tax</strong>
                        <span class="text-muted small">${{ $cart_tax }}</span>
                    </li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between">
                        <strong class="text-uppercase small font-weight-bold">Total</strong>
                        <span>${{ $cart_total }}</span>
                    </li>
                    <li class="border-bottom my-3"></li>
                    <li>
                        <form wire:submit.prevent="applyDiscount()">
                            @if(session()->has('coupon'))
                                <button type="button" wire:click.prevent="removeCoupon()" class="btn btn-danger btn-sm btn-block w-100">
                                    <i class="fas fa-gift me-2"></i>Remove coupon
                                </button>
                            @else
                                <input type="text" wire:model="coupon_code" class="form-control" placeholder="Enter your coupon">
                                <button type="submit" class="btn btn-dark btn-sm btn-block mt-1 w-100">
                                    <i class="fas fa-gift me-2"></i>Apply coupon
                                </button>
                            @endif
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
