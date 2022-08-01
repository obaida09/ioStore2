<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\DataTables\CityDatatable;
use App\Http\Requests\Admin\CityRequest;
use App\Models\State;

class CityController extends Controller
{
    public function index(CityDatatable $city)
    {
        if (!auth()->user()->ability('admin', 'manage_cities, show_cities')) {
            return redirect('admin/index');
        }

        $title = 'Control City';
        return $city->render('admin.cities.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_cities')) {
            return redirect('admin/index');
        }
        $states = State::get(['id', 'name']);
        return view('admin.cities.create', compact('states'));
    }

    public function store(CityRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_cities')) {
            return redirect('admin/index');
        }

        City::create($request->validated());
        toast('Created successfully', 'success');
        return redirect()->route('admin.cities.index');
    }

    public function show(City $city)
    {
        if (!auth()->user()->ability('admin', 'display_cities')) {
            return redirect('admin/index');
        }

        return view('admin.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        if (!auth()->user()->ability('admin', 'update_cities')) {
            return redirect('admin/index');
        }
        $states = State::get(['id', 'name']);
        return view('admin.cities.edit', compact('states', 'city'));
    }

    public function update(CityRequest $request, City $city)
    {
        if (!auth()->user()->ability('admin', 'update_cities')) {
            return redirect('admin/index');
        }

        $city->update($request->validated());

        toast('Updated successfully', 'success');
        return redirect()->route('admin.cities.index');
    }

    public function destroy(City $city)
    {
        if (!auth()->user()->ability('admin', 'delete_cities')) {
            return redirect('admin/index');
        }
        $city->delete();

        toast('Deleted successfully', 'success');
        return redirect()->route('admin.cities.index');
    }

    public function get_cities(Request $request)
    {
        $cities = City::whereStateId($request->state_id)->whereStatus(true)->get(['id', 'name'])->toArray();
        return response()->json($cities);
    }
}
