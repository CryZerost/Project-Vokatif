<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->role != 'admin') {
                toastr()->error('You are not able to route here.');
                return redirect()->route('home');

            }
            return $next($request);
        });
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = User::query();

    if ($search) {
        $query->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('username', 'like', "%$search%")
            ->orWhere('prodi', 'like', "%$search%");
    }

    $users = $query->paginate(5);

    return view('admin.index', compact('users'));
}


    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:32', 'min:4', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prodi' => ['required', 'string', Rule::in([
                'Teknik Informatika',
                'Multimedia dan Jaringan',
                'Animasi',
                'Teknik Geomatika',
                'TRPL',
            ])],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        toastr()->success('User created successfully.');
        return redirect()->route('admin.index');
    }

    public function avatarstore(Request $request, $userId)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $user = User::findOrFail($userId); // Retrieve the user by ID

        if ($request->hasFile('avatar') && $request->has('upload_avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $email = $user->email;

            // Delete previous avatar file if it exists
            $previousAvatar = $user->avatar;
            if ($previousAvatar) {
                $previousAvatarPath = public_path('asset/user/' . $email . '/profile/' . $previousAvatar);
                if (file_exists($previousAvatarPath)) {
                    unlink($previousAvatarPath);
                }
            }

            $request->avatar->move(public_path('asset/user/' . $email . '/profile/'), $avatarName);
            $user->update(['avatar' => $avatarName]);

            toastr()->success('Profile picture updated successfully.');
            return redirect()->route('admin.edit', $user);
        } elseif ($request->has('delete_avatar')) {
            // Delete current avatar file if it exists
            $avatar = $user->avatar;
            if ($avatar) {
                $email = $user->email;
                $previousAvatar = $user->avatar;

                $avatarPath = public_path('asset/user/' . $email . '/profile/' . $previousAvatar);
                if (file_exists($avatarPath)) {
                    unlink($avatarPath);
                }
            }

            $user->update(['avatar' => null]);

            toastr()->success('Profile picture deleted successfully.');
            return redirect()->route('admin.edit', $user);
        } else {
            toastr()->error('Please select a valid image file.');
            return redirect()->route('admin.edit', $user);
        }
    }

    /**
     * Show the form for editing a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:32', 'min:4', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'prodi' => ['required', 'string', Rule::in([
                'Teknik Informatika',
                'Multimedia dan Jaringan',
                'Animasi',
                'Teknik Geomatika',
                'TRPL',
            ])],
            'bio' => ['nullable', 'string', ],
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        $user->update($validatedData);

        toastr()->success('User updated successfully.');
        return redirect()->route('admin.index');
    }

    /**
     * Delete a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        toastr()->success('User deleted successfully.');
        return redirect()->route('admin.index');
    }
}
