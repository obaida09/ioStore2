<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddressRequest;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('frontend.customer.index');
    }

    public function profile()
    {
        return view('frontend.customer.profile');
    }

    public function update_profile(ProfileRequest $request)
    {
        $user = auth()->user();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;

        if (!empty($request->password) && !Hash::check($request->password, $user->password)) {
            $data['password'] = bcrypt($request->password);
        }

        if ($user_image = $request->file('user_image')) {
            if ($user->user_image != '') {
                if (File::exists('assets/users/' . $user->user_image)){
                    unlink('assets/users/' . $user->user_image);
                }
            }

            $file_name = $user->username . '.' . $user_image->extension();
            $path = public_path('assets/users/'. $file_name);
            Image::make($user_image->getRealPath())->resize(300, null, function ($constraints) {
                $constraints->aspectRatio();
            })->save($path, 100);
            $data['user_image'] = $file_name;
        }

        $user->update($data);

        toast('Profile updated', 'success');
        return back();
    }

    public function addresses()
    {
        $countries = Country::get(['id', 'name']);
        $addresses  = UserAddress ::get(['id', 'address_title']);
        return view('frontend.customer.addresses', compact('countries', 'addresses'));
    }

    public function create_address(AddressRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->validated();
            unset($data["_token"]);
            unset($data["_method"]);
            $data['user_id'] = auth()->user()->id;
    
            UserAddress::create($data);
            return 'Address Created successfully';
          }
          return abort('403');
    }

    public function edit_address($id)
    {
      $data = UserAddress::find($id);
      return response()->json($data);
    }
  

    public function update_address(AddressRequest $request, $id)
    {
        if ($request->ajax()) {
            UserAddress::where('id', $id)->update($request->validated());
            return 'Address Updated successfully';;
          }
          return abort('403');
    }

    public function destroy_address(Request $request, $id)
    {
      if ($request->ajax()) {
        UserAddress::find($id)->delete();
        return 'Address Deleted successfully';
      }
      return abort('403');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->with('products')->get();
        return view('frontend.customer.orders', compact('orders'));
    }

    public function order_view($id)
    {
        $data = Order::where('id', $id)->with('products')->get();
        return response()->json($data);
    }
}
