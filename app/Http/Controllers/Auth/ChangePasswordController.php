<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangeForm()
    {
        return view('auth.passwords.change');
    }

    public function passwordChange(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $duck = Auth::user();

        if (!(Hash::check($request->input('old_password'), $duck->password))) {
            // The passwords not matches
            return back()->withErrors(["old_password" => "Your current password does not matches with the password you provided. Please try again."]);
        }

        if (Hash::check($request->input('new_password'), $duck->password)) {
            //Current password and new password are same
            return back()->withErrors(["new_password" => "New Password cannot be same as your current password. Please choose a different password."]);
        }

        $duck->password = Hash::make($request->input('new_password'));
        $duck->save();

        return redirect()->route('ducks.profile');
    }

}
