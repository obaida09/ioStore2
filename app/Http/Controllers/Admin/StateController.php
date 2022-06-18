<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use App\DataTables\StateDatatable;
use App\Http\Requests\Admin\StateRequest;
use App\Models\Country;

class StateController extends Controller
{
    public function index(StateDatatable $state)
    {
        if (!auth()->user()->ability('admin', 'manage_states, show_states')) {
            return redirect('admin/index');
        }

        $title = 'Control State';
        return $state->render('admin.states.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_states')) {
            return redirect('admin/index');
        }
        $countries = Country::get(['id', 'name']);
        return view('admin.states.create', compact('countries'));
    }

    public function store(StateRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_states')) {
            return redirect('admin/index');
        }

        State::create($request->validated());

        return redirect()->route('admin.states.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(State $state)
    {
        if (!auth()->user()->ability('admin', 'display_states')) {
            return redirect('admin/index');
        }

        return view('admin.states.show', compact('state'));
    }

    public function edit(State $state)
    {
        if (!auth()->user()->ability('admin', 'update_states')) {
            return redirect('admin/index');
        }
        $countries = Country::get(['id', 'name']);
        return view('admin.states.edit', compact('countries', 'state'));
    }

    public function update(StateRequest $request, State $state)
    {
        if (!auth()->user()->ability('admin', 'update_states')) {
            return redirect('admin/index');
        }

        $state->update($request->validated());

        return redirect()->route('admin.states.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(State $state)
    {
        if (!auth()->user()->ability('admin', 'delete_states')) {
            return redirect('admin/index');
        }
        $state->delete();

        return redirect()->route('admin.states.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function get_states(Request $request)
    {
        $states = State::whereCountryId($request->country_id)->whereStatus(true)->get(['id', 'name'])->toArray();
        return response()->json($states);
    }
}
