<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCoupon;
use Illuminate\Http\Request;
use App\DataTables\ProductCouponDatatable;
use App\Http\Requests\Admin\ProductCouponRequest;

class ProductCouponController extends Controller
{
    public function index(ProductCouponDatatable $coupon)
    {
        if (!auth()->user()->ability('admin', 'manage_product_coupons, show_product_coupons')) {
            return redirect('admin/index');
        }

        $title = 'Control Product\'s Coupons';
        return $coupon->render('admin.product_coupons.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_product_coupons')) {
            return redirect('admin/index');
        }
        return view('admin.product_coupons.create');
    }

    public function store(ProductCouponRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_product_coupons')) {
            return redirect('admin/index');
        }

        ProductCoupon::create($request->validated());

        return redirect()->route('admin.product_coupons.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(ProductCoupon $productCoupon)
    {
        //
    }

    public function edit(ProductCoupon $productCoupon)
    {
        if (!auth()->user()->ability('admin', 'update_product_coupons')) {
            return redirect('admin/index');
        }
        return view('admin.product_coupons.edit', compact('productCoupon'));
    }

    public function update(ProductCouponRequest $request, ProductCoupon $productCoupon)
    {
        if (!auth()->user()->ability('admin', 'update_product_coupons')) {
            return redirect('admin/index');
        }

        $productCoupon->update($request->validated());

        return redirect()->route('admin.product_coupons.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(ProductCoupon $productCoupon)
    {
        if (!auth()->user()->ability('admin', 'delete_product_coupons')) {
            return redirect('admin/index');
        }

        $productCoupon->delete();

        return redirect()->route('admin.product_coupons.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
