@extends('admin.layouts.admin')

@section('admin-content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-2 font-weight-bold text-primary">Edit product ({{ $product->name }})</h6>
        <div class="ml-auto">
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">
                <span class="icon text-white-50">
                    <i class="fa fa-home"></i>
                </span>
                <span class="text">Products</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <label for="product_category_id">Category</label>
                    <select name="product_category_id" class="form-control">
                        <option value="">---</option>
                        @forelse($categories as $category)
                        <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id)
                            == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('product_category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : null }}>Active</option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : null }}>Inactive
                        </option>
                    </select>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="description">Description</label>
                    <textarea name="description" rows="3" class="form-control summernote">
                            {!! old('description', $product->description) !!}
                        </textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                        class="form-control">
                    @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-4">
                    <label for="featured">Featured</label>
                    <select name="featured" class="form-control">
                        <option value="1" {{ old('featured', $product->featured) == 1 ? 'selected' : null }}>Yes
                        </option>
                        <option value="0" {{ old('featured', $product->featured) == 0 ? 'selected' : null }}>No</option>
                    </select>
                    @error('featured')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="tags">tags</label>
                    <select name="tags[]" class="form-control select2" multiple="multiple">
                        @forelse($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ?
                            'selected' : null }}>{{ $tag->name }}</option>
                        @empty
                            <h3>No tag select</h3>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="images">Images</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="images[]" id="product-images" class="file-input-overview"
                            multiple="multiple">
                        @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
        <div class="product-image my-5">
            <h2 class="mt-4">Image's Product</h2>
            <hr>
            @foreach($product->media as $media)
            <div class="col-2 my-3">
                <img src="{{ asset('assets/products/'.$media->file_name) }}" alt="{{ $product->name }}">
                <a href="{{ route('admin.products.remove_image', $media->id) }}"><i class="fa fa-trash"></i></a>
            </div>
            @endforeach
        </div>       
    </div>
</div>


@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function(){
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $(".select2").select2({
                tags: true,
                multiple: true,
                closeOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });

            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

        });
</script>
@endpush

@endsection