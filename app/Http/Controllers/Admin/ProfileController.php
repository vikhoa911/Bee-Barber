<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile.main-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'       => 'required|string|max:50',
            'phone'      => 'nullable|string|max:20',
            'bio'        => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:50',
            'city'       => 'nullable|string|max:50',
            'avatar'     => 'nullable|image|max:2048',
            'date_of_birth' => 'nullable|date',
        ]);

        // Nếu có upload ảnh mới
        $data = $request->only(['name', 'phone', 'bio', 'country', 'city', 'date_of_birth']);
        $user->update($data);
        return redirect()->route('admin.profile');
    }

    public function updateAddress(Request $request)
    {
        $user = auth()->user();
        $user->city = $request->city;
        $user->country = $request->country;
        $user->save();

        return redirect()->back()->with('success', 'Address updated!');
    }
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048', // max 2MB
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($user->avatar) {
                $oldPath = str_replace('/storage/', '', $user->avatar);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = '/storage/' . $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Avatar updated!');
    }
}
