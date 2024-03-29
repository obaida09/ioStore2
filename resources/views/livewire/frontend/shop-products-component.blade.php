<div>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">

                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">

                    <!-- Get Categories -->
                    <h5 class="text-uppercase mb-4">Categories</h5>
                    @foreach($shop_categories_menu as $shop_category)
                        <div class="py-2 px-4 bg-dark text-white mb-3">
                            <strong
                                class="small text-uppercase font-weight-bold {{request()->path() == 'shop/'.$shop_category->slug ? 'active-menu':''}}">
                                {{ $shop_category->name }}
                            </strong>
                        </div>
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            @forelse($shop_category->appearedChildren as $sub_shop_category)
                            <li class="mb-2">
                                <a class="reset-anchor {{request()->path() == 'shop/'.$sub_shop_category->slug ? 'active-menu':''}}"
                                    href="{{ route('frontend.shop', $sub_shop_category->slug) }}">
                                    {{ $sub_shop_category->name }}
                                </a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    @endforeach
                    <h6 id="tes"></h6>

                    <!-- Price Range -->
                    <h6 class="text-uppercase mt-5 mb-4">Price range</h6>
                    <div class="price-range pt-4 mb-3">
                        <div id="range" wire:ignore class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"></div>
                    </div>
                    <div class="btn btn-dark btn-sm btn-block price-range-btn">Send</div>

                    <!-- Get tags -->
                    @if($tags != '')
                        <h5 class="text-uppercase mb-4 mt-5">Tags</h5>
                        <div class="menu-tag ms-3">
                            @foreach($tags as $tag)
                            <div class="form-check mb-1">
                                <input class="form-check-input" wire:model="sortingByTags" value="{{ $tag->id }}"
                                    type="checkbox" id="checkbox_1">
                                <label class="form-check-label" for="checkbox_1">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-sm text-muted mb-0">
                                Showing {{ $products->firstItem() }}– {{ $products->lastItem() }} of {{ $products->total() }} results
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item text-muted mr-3">
                                    <a wire:click="sort('three_items')" class="reset-anchor p-0"
                                        href="javascript:void(0);" id="three_items">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item text-muted mr-3">
                                    <a wire:click="sort('four_items')" class="reset-anchor p-0"
                                        href="javascript:void(0);" id="four_items">
                                        <i class="fas fa-th"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item" wire:ignore>
                                    <select class="selectpicker ml-auto" wire:model="sortingBy" data-width="200"
                                        data-style="bs-select-form-control" data-title="Default sorting">
                                        <option value="default">Default sorting</option>
                                        <option value="popularity">Popularity</option>
                                        <option value="low-high">Price: Low to High</option>
                                        <option value="high-low">Price: High to Low</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Get Products-->
                        @forelse($products as $product)
                        <div class="col-{{ $sortClass }}" id="products-container-area">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white badge-"></div>
                                    <a class="d-block" href="{{ route('frontend.product', $product->slug) }}">
                                        <img class="img-fluid w-100" src="{{ asset('assets/products/' . $product->firstMedia->file_name) }}" alt="{{ $product->name }}">
                                    </a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0">
                                                <a wire:click.prevent="addToWishList('{{ $product->id }}')"
                                                    class="btn btn-sm btn-outline-dark">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item m-0 p-0">
                                                <a wire:click.prevent="addToCart('{{ $product->id }}')"
                                                    class="btn btn-sm btn-dark">
                                                    Add to cart
                                                </a>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <a wire:click.prevent="$emit('showProductModalAction', '{{ $product->slug }}')"
                                                    class="btn btn-sm btn-outline-dark" data-target="#productView"
                                                    data-toggle="modal">
                                                    <i class="fas fa-expand"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h6><a class="reset-anchor" href="{{ route('frontend.product', $product->slug) }}">{{
                                        $product->name }}</a></h6>
                                <p class="small text-muted">${{ $product->price }}</p>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <!-- PAGINATION-->
                    {!! $products->appends(request()->all())->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            // slider.noUiSlider.on('update', function (value) {
            // var dive = document.getElementById('tes');
            // dive.innerHTML += 'Extra stuff';
            //     @this.set('minPrice', value[0]);
            //     @this.set('maxPrice', value[1]);
            // });

            var range = document.getElementById('range');
            noUiSlider.create(range, {
                range: {
                'min': 0,
                'max': 2000
                },
                step: 5,
                start: [0, 1000],
                margin: 60,
                connect: true,
                direction: 'ltr',
                orientation: 'horizontal',
                behaviour: 'tap-drag',
                tooltips: true,
                format: {
                to: function ( value ) {
                    return value;
                },
                from: function ( value ) {
                    return value.replace('', '');
                }
                }
            });

            $('.noUi-handle-lower .noUi-tooltip').on('mouseleave', function(){
                var start = document.querySelector(".noUi-handle-lower .noUi-tooltip").innerHTML;
                console.log(start)
            });


            $('.price-range-btn').on('click', function() {
                    var end  = document.querySelector(".noUi-handle-upper .noUi-tooltip").innerHTML;
                    @this.set('maxPrice', end);
                    console.log(end);

                    var start = document.querySelector(".noUi-handle-lower .noUi-tooltip").innerHTML;
                    @this.set('minPrice', start);
                    console.log(start)

                    $( this ).addClass( "op-1");
                });
        </script>
    @endpush
</div>