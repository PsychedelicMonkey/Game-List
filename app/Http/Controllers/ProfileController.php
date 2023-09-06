<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // Upload image
        if ($request->hasFile('image') && $request->user()->hasVerifiedEmail()) {
            $file = $request->file('image');

            if (!Storage::directoryExists('public/profile')) {
                Storage::disk('public')->makeDirectory('profile');
            }

            $image = Storage::putFile('public/profile', $file);

            Image::make(Storage::path($image))
                ->fit(120, 120)
                ->save();

            $request->user()->profile->update([
                'image' => URL::to(Storage::url($image)),
            ]);
        }

        // Update bio
        if ($request->user()->hasVerifiedEmail()) {
            $request->user()->profile->update([
                'bio' => $request->bio,
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
