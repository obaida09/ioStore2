<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Tag;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $product)
    {
        $title = 'Control Products';
        return $product->render('admin.products.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_products')) {
            return redirect('admin/index');
        }

        $categories = ProductCategory::whereStatus(1)->get(['id', 'name']);
        $tags = Tag::whereStatus(1)->get(['id', 'name']);
        return view('admin.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_products')) {
            return redirect('admin/index');
        }


        $data = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        // $input['name'] = $request->name;
        // $input['slug'] =  Str::slug($request->name);
        // $input['description'] = $request->description;
        // $input['price'] = $request->price;
        // $input['quantity'] = $request->quantity;
        // $input['product_category_id'] = $request->product_category_id;
        // $input['featured'] = $request->featured;
        // $input['status'] = $request->status;
        // dd($input);
        $product = Product::create($data);
        $product->tags()->attach($request->tags);

        if ($request->images && count($request->images) > 0) {
            $i = 1;
            foreach ($request->images as $image) {
                $file_name = $product->slug. '_' . time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets\products\\' . $file_name);

                Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);

                $product->media()->create([
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => true,
                    'file_sort' => $i,
                ]);
                $i++;
            }
        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!auth()->user()->ability('admin', 'update_products')) {
            return redirect('admin/index');
        }

        $categories = ProductCategory::whereStatus(1)->get(['id', 'name']);
        $tags = Tag::whereStatus(1)->get(['id', 'name']);
        return view('admin.products.edit', compact('categories', 'tags', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if (!auth()->user()->ability('admin', 'update_products')) {
            return redirect('admin/index');
        }

        $data = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        $product->update($data);
        $product->tags()->sync($request->tags);

        if ($request->images && count($request->images) > 0) {
            $i = $product->media()->count() + 1;
            foreach ($request->images as $image) {

                $imageData = [
                    'file_name' => $product->slug. '_' . time() . '_' . $i . '.' . $image->getClientOriginalExtension(),
                    'file_size' => $image->getSize(),
                    'file_type' => $image->getMimeType(),
                    'path' => public_path('assets/products/' . $file_name),
                ];
                dd($imageData);
                Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($imageData['path'], 100);

                $product->media()->create($imageData);
                $i++;
            }
        }

        return redirect()->route('admin.products.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (!auth()->user()->ability('admin', 'delete_products')) {
            return redirect('admin/index');
        }

        if ($product->media()->count() > 0) {
            foreach ($product->media as $media) {
                if (File::exists('assets/products/'. $media->file_name)){
                    unlink('assets/products/'. $media->file_name);
                }
                $media->delete();
            }
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
