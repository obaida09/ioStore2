<tr x-data="{ show: true }" x-show="show">
    {{-- <th class="pl-0 border-0" scope="row">
        <div class="media align-items-center">
            <a class="reset-anchor d-block animsition-link" href="{{ route('frontend.product', $cartItem->model->slug) }}">
                <img src="{{ asset('assets/products/' . $cartItem->model->firstMedia->file_name) }}" alt="{{ $cartItem->model->name }}" width="70"/>
            </a>
            <div class="media-body ml-3">
                <strong class="h6">
                    <a class="reset-anchor animsition-link" href="{{ route('frontend.product', $cartItem->model->slug) }}">
                    
                        {{ $cartItem->model->name }}
                    </a>
                </strong>
            </div>
        </div>
    </th>
    <td class="align-middle border-0">
        <p class="mb-0 small">${{ $cartItem->model->price }}</p>
    </td>
    <td class="align-middle border-0">
        <div class="border d-flex align-items-center justify-content-between px-3">
            <span class="small text-uppercase text-gray headings-font-family">Quantity</span>
            <div class="quantity">
                <button wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')" class="p-0"><i class="fas fa-caret-left"></i></button>
                <span class="form-control form-control-sm border-0 shadow-0 px-2 text-center">
                    {{ $item_quantity }}
                </span>

                <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text"/>
                <button wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}')" class="p-0"><i class="fas fa-caret-right"></i></button>
            </div>
        </div>
    </td>
    <td class="align-middle border-0">
        <p class="mb-0 small">${{ $cartItem->model->price * $cartItem->qty }}</p>
    </td>
    <td class="align-middle border-0">
        <a wire:click.prevent="removeFromCart('{{ $cartItem->rowId }}')" x-on:click="show = false" class="reset-anchor">
            <i class="fas fa-trash-alt small text-muted"></i>
        </a>
    </td> --}}
          
    <th class="ps-0 py-3 border-light" scope="row">
    <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="{{ asset('assets/products/' . $cartItem->model->firstMedia->file_name) }}" alt="{{ $cartItem->model->name }}" alt="..." width="70" /></a>
        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html">{{ $cartItem->model->name }}</a></strong></div>
    </div>
    </th>
    <td class="p-3 align-middle border-light">
        <p class="mb-0 small">${{ $cartItem->model->price }}</p>
    </td>
    <td class="p-3 align-middle border-light">
        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family"> quantity {{ $cartItem->item_quantity }}</span>
        <div class="quantity">
            <button wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')" class="p-0"><i class="fas fa-caret-left"></i></button>
            <span class="form-control form-control-sm border-0 shadow-0 px-2 text-center">
                {{ $item_quantity }}
            </span>

            {{--<input class="form-control form-control-sm border-0 shadow-0 p-0" type="text"/>--}}
            <button wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}')" class="p-0"><i class="fas fa-caret-right"></i></button>
        </div>
        </div>
    </td>
    <td class="p-3 align-middle border-light">
        <p class="mb-0 small">${{ $cartItem->model->price * $cartItem->qty }}</p>
    </td> 
    <td class="p-3 align-middle border-light"><a class="reset-anchor" href="#!">
        <a wire:click.prevent="removeFromCart('{{ $cartItem->rowId }}')" x-on:click="show = false" class="reset-anchor">
            <i class="fas fa-trash-alt small text-muted"></i>
        </a>
    </td>       
</tr>
