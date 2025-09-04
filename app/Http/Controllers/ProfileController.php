<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('avatar') && $request->has('upload_avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $email = Auth()->user()->email;

            // Delete previous avatar file if it exists
            $previousAvatar = Auth()->user()->avatar;
            if ($previousAvatar) {
                $previousAvatarPath = public_path('asset/user/' . $email . '/profile/' . $previousAvatar);
                if (file_exists($previousAvatarPath)) {
                    unlink($previousAvatarPath);
                }
            }

            $request->avatar->move(public_path('asset/user/' . $email . '/profile/'), $avatarName);
            Auth()->user()->update(['avatar' => $avatarName]);
            toastr()->success('Profile pictured updated successfully.');
            /* return back()->with('success', 'Profile Picture updated successfully.'); */
            return redirect()->route('user.update');
        } elseif ($request->has('delete_avatar')) {
            // Delete current avatar file if it exists
            $avatar = Auth()->user()->avatar;
            if ($avatar) {
                $email = Auth()->user()->email;
                $previousAvatar = Auth()->user()->avatar;

                $avatarPath = public_path('asset/user/' . $email . '/profile/' . $previousAvatar);
                if (file_exists($avatarPath)) {
                    unlink($avatarPath);
                }
            }

            Auth()->user()->update(['avatar' => null]);
            toastr()->success('Profile picture deleted successfully.');
            /* return back()->with('success', 'Avatar deleted successfully.'); */
            return redirect()->route('user.update');
        } else {
            toastr()->error('Please select a valid image file.');
            /*  return back()->withErrors(['avatar' => 'Please select a valid image file.']); */
            return redirect()->route('user.update');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:32', 'min:4', Rule::unique('users')->ignore($user->id)],
            'prodi' => ['required', 'string', 'max:50'],
            'bio' => ['nullable', 'string',],
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        toastr()->success('Profile updated successfully.');
        /* return redirect()->back()->with('success', 'Profile updated successfully.'); */
        return redirect()->route('user.update');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.update', compact('user'));
    }

    public function show(User $user)
    {
        // Retrieve the user's data and pass it to the profile view
        return view('profile.show', compact('user'));
    }

}
