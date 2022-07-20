<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductCategoriesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategoriesDataTable $productCategory)
    {
        if (!auth()->user()->ability('admin', 'manage_product_categories, show_product_categories')) {
            return redirect('admin/index');
        }

        $title = 'Control Products Category';
        return $productCategory->render('admin.product_categories.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_product_categories')) {
            return redirect('admin/index');
        }

        $main_categories = ProductCategory::whereNull('parent_id')->get(['id', 'name']);
        return view('admin.product_categories.create', compact('main_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_product_categories')) {
            return redirect('admin/index');
        }

        $data = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        if ($image = $request->file('cover')) {
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('assets\product_categories\\' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['cover'] = $file_name;
        }

        ProductCategory::create($data);
        toast('Created successfully', 'success');
        return redirect()->route('admin.product_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->ability('admin', 'display_product_categories')) {
            return redirect('admin/index');
        }

        return view('admin.product_categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        if (!auth()->user()->ability('admin', 'update_product_categories')) {
            return redirect('admin/index');
        }

        $main_categories = ProductCategory::whereNull('parent_id')->get(['id', 'name']);
        return view('admin.product_categories.edit', compact('main_categories', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        if (!auth()->user()->ability('admin', 'update_product_categories')) {
            return redirect('admin/index');
        }

        $data = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        if ($image = $request->file('cover')) {
            if ($productCategory->cover != null && File::exists('assets/product_categories/'. $productCategory->cover)){
                unlink('assets/product_categories/'. $productCategory->cover);
            }
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/product_categories/' . $file_name);

            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['cover'] = $file_name;
        }

        $productCategory->update($data);
        toast('Updated successfully', 'success');
        return redirect()->route('admin.product_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->ability('admin', 'delete_product_categories')) {
            return redirect('admin/index');
        }

        $productCategory = ProductCategory::find($id);
        if (File::exists('assets/product_categories/'. $productCategory->cover)){
            unlink('assets/product_categories/'. $productCategory->cover);
        }

        $productCategory->delete();
        toast('Deleted successfully', 'success');
        return redirect()->route('admin.product_categories.index');
    }
}
