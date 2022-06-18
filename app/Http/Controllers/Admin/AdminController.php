<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminInfoRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $admin_side_menu = Permission::tree();
        // dd($admin_side_menu);
        return view('Admin.index', compact('admin_side_menu'));
    }

    public function login()
    {
        return view('Admin.login');
    }

    public function forgotPassword()
    {
        return view('Admin.forgot-password');
    }

    public function account_settings()
    {
        return view('admin.account_settings');
    }

    public function update_account_settings(AdminInfoRequest $request)
    {
        $data = $request->validated();
        unset($data['password']);

        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        }
        if ($image = $request->file('user_image')) {
            if (auth()->user()->user_image != null && File::exists('assets/users/' . auth()->user()->user_image)) {
                unlink('assets/users/' . auth()->user()->user_image);
            }
            $file_name = Str::slug($request->username) . "." . $image->getClientOriginalExtension();
            $path = public_path('/assets/users/' . $file_name);
            Image::make($image->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['user_image'] = $file_name;
        }

        auth()->user()->update($data);

        return redirect()->route('admin.account_settings')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success',
        ]);

    }
}
