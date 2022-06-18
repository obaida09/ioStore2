<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\DataTables\ProductReviewDatatable;
use App\Http\Requests\Admin\ProductReviewRequest;

class ProductReviewController extends Controller
{
    public function index(ProductReviewDatatable $review)
    {
        if (!auth()->user()->ability('admin', 'manage_product_reviews, show_product_reviews')) {
            return redirect('admin/index');
        }

        $title = 'Control Product\'s Reviews';
        return $review->render('admin.product_reviews.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_product_reviews')) {
            return redirect('admin/index');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
         if (!auth()->user()->ability('admin', 'create_product_reviews')) {
            return redirect('admin/index');
        }
    }

    public function show(ProductReview $productReview)
    {
        //
    }

    public function edit(ProductReview $productReview)
    {
        if (!auth()->user()->ability('admin', 'update_product_reviews')) {
            return redirect('admin/index');
        }

        return view('admin.product_reviews.edit', compact('productReview'));
    }

    public function update(ProductReviewRequest $request, ProductReview $productReview)
    {
        if (!auth()->user()->ability('admin', 'update_product_reviews')) {
            return redirect('admin/index');
        }

        $productReview->update($request->validated());

        return redirect()->route('admin.product_reviews.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(ProductReview $productReview)
    {
        if (!auth()->user()->ability('admin', 'delete_product_reviews')) {
            return redirect('admin/index');
        }

        $productReview->delete();

        return redirect()->route('admin.product_reviews.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
