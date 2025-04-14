<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    /**
     * Update the admin profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validate the basic info
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
        ]);

        // Additional validation if password is being updated
        if ($request->filled('password')) {
            $validator->addRules([
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ]);
        }

        // Return with errors if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Update the basic info
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
