<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShippingCompanyDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShippingCompanyRequest;
use App\Models\Country;
use App\Models\ShippingCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingCompanyController extends Controller
{
    public function index(ShippingCompanyDatatable $shipping)
    {
        if (!Auth::user()->ability('admin', 'manage_shipping_companies,show_shipping_companies')){
            return redirect('admin/index');
        }

        $title = 'Control Shipping\'s Companies';
        return $shipping->render('admin.shipping_companies.index', compact('title'));
    }

    public function create()
    {
        if (!Auth::user()->ability('admin', 'create_shipping_companies')){
            return redirect('admin/index');
        }
        $countries = Country::orderBy('id', 'asc')->get(['id', 'name']);
        return view('admin.shipping_companies.create', compact('countries'));
    }

    public function store(ShippingCompanyRequest $request)
    {
        if (!Auth::user()->ability('admin', 'create_shipping_companies')){
            return redirect('admin/index');
        }

        if ($request->validated()) {
        
            $shipping_company = ShippingCompany::create($request->except('countries', '_token', 'submit'));
            $shipping_company->countries()->attach(array_values($request->countries));
            
            toast('Created successfully', 'success');
            return redirect()->route('admin.shipping_companies.index')->with([
                'message' => 'Created successfully',
                'alert-type' => 'success'
            ]);
            
        } else {
            toast('Something wrong', 'danger');
            return redirect()->route('admin.shipping_companies.index');
        }
    }

    public function edit(ShippingCompany $shipping_company)
    {
        if (!Auth::user()->ability('admin', 'update_shipping_companies')){
            return redirect('admin/index');
        }

        $shipping_company->with('countries');
        $countries = Country::get(['id', 'name']);
        return view('admin.shipping_companies.edit', compact('shipping_company', 'countries'));
    }

    public function update(ShippingCompanyRequest $request, ShippingCompany $shipping_company)
    {
        if (!Auth::user()->ability('admin', 'update_shipping_companies')){
            return redirect('admin/index');
        }


        if ($request->validated()) {
        
            $shipping_company->update($request->except('countries', '_token', 'submit'));
            $shipping_company->countries()->sync(array_values($request->countries));
            
            toast('Updated successfully', 'success');
            return redirect()->route('admin.shipping_companies.index');   
            
        } else {
            toast('Something wrong', 'danger');
            return redirect()->route('admin.shipping_companies.index');
        }
    }

    public function destroy(ShippingCompany $shipping_company)
    {
        if (!Auth::user()->ability('admin', 'delete_shipping_companies')){
            return redirect('admin/index');
        }
        $shipping_company->delete();
        
        toast('Deleted successfully', 'success');
        return redirect()->route('admin.shipping_companies.index');
    }
}
