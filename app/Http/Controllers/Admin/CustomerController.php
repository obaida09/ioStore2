<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomerDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function index(CustomerDatatable $customer)
    {
        if (!auth()->user()->ability('admin', 'manage_customers, show_customers')) {
            return redirect('admin/index');
        }

        $title = 'Control Products Customer';
        return $customer->render('admin.customers.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_customers')) {
            return redirect('admin/index');
        }

        return view('admin.customers.create');
    }

    public function store(CustomerRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_customers')) {
            return redirect('admin/index');
        }

        $data = $request->validated();

        // Add Image
        if ($image = $request->file('user_image')) {
            $file_name = Str::slug($request->username).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);
            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['user_image'] = $file_name;
        }

        // Customer Create
        $customer = User::create($data);
        $customer->markEmailAsVerified();
        $customer->attachRole(Role::whereName('cu
        stomer')->first()->id);
        toast('Created successfully', 'success');
        return redirect()->route('admin.customers.index');
    }

    public function show(User $customer)
    {
        if (!auth()->user()->ability('admin', 'display_customers')) {
            return redirect('admin/index');
        }

        return view('admin.customers.show', compact('customer'));
    }

    public function edit(User $customer)
    {
        if (!auth()->user()->ability('admin', 'update_customers')) {
            return redirect('admin/index');
        }

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, User $customer)
    {
        if (!auth()->user()->ability('admin', 'update_customers')) {
            return redirect('admin/index');
        }

        $data = $request->validated();
        $data['status'] = $request->status;
        unset($data['password']);

        // Add Password to data
        trim($request->password) != '' ? $data['password'] = bcrypt($request->password):'';

        // Add Image
        if ($image = $request->file('user_image')) {
            if ($customer->user_image != null && File::exists('assets/users/'. $customer->user_image)){
                unlink('assets/users/'. $customer->user_image);
            }
            $file_name = Str::slug($request->username).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);
            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['user_image'] = $file_name;
        }

        // Customer Update
        $customer->update($data);

        toast('Updated successfully', 'success');
        return redirect()->route('admin.customers.index');
    }

    public function destroy(User $customer)
    {
        if (!auth()->user()->ability('admin', 'delete_customers')) {
            return redirect('admin/index');
        }

        if (File::exists('assets/users/'. $customer->user_image)){
            unlink('assets/users/'. $customer->user_image);
        }
        $customer->delete();

        toast('Deleted successfully', 'success');
        return redirect()->route('admin.customers.index');
    }

    public function remove_image(Request $request)
    {
        if (!auth()->user()->ability('admin', 'delete_customers')) {
            return redirect('admin/index');
        }

        $customer = User::findOrFail($request->customer_id);
        if (File::exists('assets/users/'. $customer->user_image)){
            unlink('assets/users/'. $customer->user_image);
            $customer->user_image = null;
            $customer->save();
        }
        return true;
    }

    public function get_customers(Request $request)
    {
        // dd('asdg');
        $customers = User::whereHas('roles', function ($query) {
            $query->where('name', 'customer');
        })
            ->when(\request()->input('query') != '', function ($query) {
                $query->search(\request()->input('query'));
            })
            ->get(['id', 'first_name', 'last_name', 'email'])->toArray();

        return response()->json($customers);
    }
}
