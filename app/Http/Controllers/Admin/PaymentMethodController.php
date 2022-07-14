<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\DataTables\PaymentMethodDatatable;

class PaymentMethodController extends Controller
{
    public function index(PaymentMethodDatatable $payment_method)
    {
        if (!auth()->user()->ability('admin', 'manage_payment_methods,show_payment_methods')){
            return redirect('admin/index');
        }

        $title = 'Control Payment\'s Method';
        return $payment_method->render('admin.payment_methods.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_payment_methods')){
            return redirect('admin/index');
        }

        return view('admin.payment_methods.create');
    }

    public function store(PaymentMethodRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_payment_methods')){
            return redirect('admin/index');
        }

        PaymentMethod::create($request->validated());

        return redirect()->route('admin.payment_methods.index')->with([
            'message'    => 'Created successfully',
            'alert-type' => 'success'
        ]);

    }

    public function show(PaymentMethod $payment_method)
    {
        if (!auth()->user()->ability('admin', 'display_payment_methods')){
            return redirect('admin/index');
        }
        return view('admin.payment_methods.show', compact('payment_method'));
    }

    public function edit(PaymentMethod $payment_method)
    {
        if (!auth()->user()->ability('admin', 'update_payment_methods')){
            return redirect('admin/index');
        }

        return view('admin.payment_methods.edit', compact('payment_method'));
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        if (!auth()->user()->ability('admin', 'update_payment_methods')){
            return redirect('admin/index');
        }


        $payment_method->update($request->validated());

        return redirect()->route('admin.payment_methods.index')->with([
            'message'    => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(PaymentMethod $payment_method)
    {
        if (!auth()->user()->ability('admin', 'delete_payment_methods')){
            return redirect('admin/index');
        }

        $payment_method->delete();

        return redirect()->route('admin.payment_methods.index')->with([
            'message'    => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
