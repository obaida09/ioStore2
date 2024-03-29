<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SupervisorDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupervisorRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SupervisorController extends Controller
{
    public function index(SupervisorDatatable $supervisor)
    {
        if (!auth()->user()->ability('admin', 'manage_supervisors, show_supervisors')) {
            return redirect('admin/index');
        }

        $title = 'Control Supervisor';
        return $supervisor->render('admin.supervisors.index', compact('title'));
    }

    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_supervisors')) {
            return redirect('admin/index');
        }

        $permissions = Permission::get(['id', 'display_name']);
        return view('admin.supervisors.create', compact('permissions'));
    }

    public function store(SupervisorRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_supervisors')) {
            return redirect('admin/index');
        }

        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['username'] = $request->username;
        $input['email'] = $request->email;
        $input['mobile'] = $request->mobile;
        $input['password'] = bcrypt($request->password);
        $input['status'] = $request->status;

        if ($image = $request->file('user_image')) {
            $file_name = Str::slug($request->username).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);
            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['user_image'] = $file_name;
        }

        $supervisor = User::create($input);
        $supervisor->markEmailAsVerified();
        $supervisor->attachRole(Role::whereName('supervisor')->first()->id);
        // add permissions
        if (isset($request->permissions) && count($request->permissions) > 0) {
            $supervisor->permissions()->sync($request->permissions);
        }
        
        toast('Created successfully', 'success');
        return redirect()->route('admin.supervisors.index');
    }

    public function show(User $supervisor)
    {
        if (!auth()->user()->ability('admin', 'display_supervisors')) {
            return redirect('admin/index');
        }

        return view('admin.supervisors.show', compact('supervisor'));
    }

    public function edit(User $supervisor)
    {
        if (!auth()->user()->ability('admin', 'update_supervisors')) {
            return redirect('admin/index');
        }

        $permissions = Permission::get(['id', 'display_name']);
        $supervisorPermissions = UserPermissions::whereUserId($supervisor->id)->pluck('permission_id')->toArray();
        return view('admin.supervisors.edit', compact('supervisor', 'permissions', 'supervisorPermissions'));
    }

    public function update(supervisorRequest $request, User $supervisor)
    {
        if (!auth()->user()->ability('admin', 'update_supervisors')) {
            return redirect('admin/index');
        }

        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['username'] = $request->username;
        $input['email'] = $request->email;
        $input['mobile'] = $request->mobile;
        if (trim($request->password) != ''){
            $input['password'] = bcrypt($request->password);
        }
        $input['status'] = $request->status;

        if ($image = $request->file('user_image')) {
            if ($supervisor->user_image != null && File::exists('assets/users/'. $supervisor->user_image)){
                unlink('assets/users/'. $supervisor->user_image);
            }
            $file_name = Str::slug($request->username).".".$image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);
            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['user_image'] = $file_name;
        }

        $supervisor->update($input);
        // add permissions
        if (isset($request->permissions) && count($request->permissions) > 0) {
            $supervisor->permissions()->sync($request->permissions);
        }
        
        toast('Updated successfully', 'success');
        return redirect()->route('admin.supervisors.index');
    }

    public function destroy(User $supervisor)
    {
        if (!auth()->user()->ability('admin', 'delete_supervisors')) {
            return redirect('admin/index');
        }

        if (File::exists('assets/users/'. $supervisor->user_image)){
            unlink('assets/users/'. $supervisor->user_image);
        }
        $supervisor->delete();
        
        toast('Deleted successfully', 'success');
        return redirect()->route('admin.supervisors.index');
    }

    public function remove_image(Request $request)
    {
        if (!auth()->user()->ability('admin', 'delete_supervisors')) {
            return redirect('admin/index');
        }

        $supervisor = User::findOrFail($request->supervisor_id);
        if (File::exists('assets/users/'. $supervisor->user_image)){
            unlink('assets/users/'. $supervisor->user_image);
            $supervisor->user_image = null;
            $supervisor->save();
        }
        return true;
    }
}
