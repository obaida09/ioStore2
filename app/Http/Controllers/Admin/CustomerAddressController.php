<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CustomerAddressRequest;
use App\Models\Country;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\DataTables\CustomerAddressDatatable;

class CustomerAddressController extends Controller
{
    public function index(CustomerAddressDatatable $customer_addresses)
    {
        if (!auth()->user()->ability('admin', 'manage_customer_addresses, show_customer_addresses')) {
            return redirect('admin/index');
        }
        $title = 'Control Country';
        return $customer_addresses->render('admin.customer_addresses.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_customer_addresses')) {
            return redirect('admin/index');
        }

        $countries = Country::get();
        return view('admin.customer_addresses.create', compact('countries'));
    }

    public function store(CustomerAddressRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_customer_addresses')) {
            return redirect('admin/index');
        }

        UserAddress::create($request->validated());

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(UserAddress $customer_address)
    {
        if (!auth()->user()->ability('admin', 'display_customer_addresses')) {
            return redirect('admin/index');
        }

        return view('admin.customer_addresses.show', compact('customer_address'));
    }

    public function edit(UserAddress $customer_address)
    {
        if (!auth()->user()->ability('admin', 'update_customer_addresses')) {
            return redirect('admin/index');
        }

        $countries = Country::whereStatus(true)->get(['id', 'name']);
        return view('admin.customer_addresses.edit', compact('customer_address', 'countries'));
    }

    public function update(CustomerAddressRequest $request, UserAddress $customer_address)
    {
        if (!auth()->user()->ability('admin', 'update_customer_addresses')) {
            return redirect('admin/index');
        }

        $customer_address->update($request->validated());

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(UserAddress $customer_address)
    {
        if (!auth()->user()->ability('admin', 'delete_customer_addresses')) {
            return redirect('admin/index');
        }
        $customer_address->delete();

        return redirect()->route('admin.customer_addresses.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
