<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\DataTables\CountryDatatable;
use App\Http\Requests\Admin\CountryRequest;

class CountryController extends Controller
{
    public function index(CountryDatatable $country)
    {
        if (!auth()->user()->ability('admin', 'manage_countries, show_countries')) {
            return redirect('admin/index');
        }

        $title = 'Control Country';
        return $country->render('admin.countries.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_countries')) {
            return redirect('admin/index');
        }

        return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_countries')) {
            return redirect('admin/index');
        }

        Country::create($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(Country $country)
    {
        if (!auth()->user()->ability('admin', 'display_countries')) {
            return redirect('admin/index');
        }

        return view('admin.countries.show');
    }

    public function edit(Country $country)
    {
        if (!auth()->user()->ability('admin', 'update_countries')) {
            return redirect('admin/index');
        }

        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        if (!auth()->user()->ability('admin', 'update_countries')) {
            return redirect('admin/index');
        }

        $country->update($request->validated());

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Country $country)
    {
        if (!auth()->user()->ability('admin', 'delete_countries')) {
            return redirect('admin/index');
        }
        $country->delete();

        return redirect()->route('admin.countries.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
