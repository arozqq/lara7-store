<?php

namespace App\Http\Controllers;

use App\{Cart, Category, User, Profile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function profile()
    {
        $users = User::all();
        $categories = Category::get();
        return view('user.profile', compact('users', 'categories'));
    }


    public function updateProfile($id)
    {
        $profile = Profile::findOrFail($id);
        $user_id = Auth::user()->id;
        request()->validate([
            'name' => 'required|string|max:255',
            'gender' => 'string',
            'avatar' => 'image|mimes:jpeg,png,svg,jpg|max:2048',
        ]);

        if (request()->file('avatar')) {
            Storage::delete($profile->avatar);
            $avatar = request()->file('avatar')->store("image/avatars");
        } else {
            $avatar = $profile->avatar;
        }

        $profile->gender = request('gender');
        $profile->address = request('address');
        $profile->phone_number = request('phone_number');
        $profile->user_id = $user_id;
        $profile->avatar = $avatar;
        $profile->save();

        User::where('id', $user_id)->update(['name' => request('name')]);
        return redirect()->back()->with('success', 'Your profiles updated!');
    }


    public function changePassword()
    {
        return view('user.edit-password');
    }

    public function updatePassword()
    {
        request()->validate([
            'old-password' => 'required',
            'password' => ['required', 'string', 'min:7', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old-password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return redirect()->route('profile')->with('success', 'Your password has been updated!');
        } else {
            return back()->withErrors(['old-password' => 'Make sure you fill your current password']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
