<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dologController extends Controller
{
	public function dolog(Request $request) {
		// dd($request->all());
		$validated = $request->validate([
			'email' => 'required|max:255|email',
			'password' => 'required',
		]);
		$rememberme = $request->remember == 'on' ? true: false;
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $rememberme)) {
			return redirect('admin/home');
		} else {
			session()->flash('error', trans('admin.inccorrect_information_login'));
			return redirect()->back()->withInput($request->only('email', 'remember'));
		}
	}
}
