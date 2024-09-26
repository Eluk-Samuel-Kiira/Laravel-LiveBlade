<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Log or check if the 'viewBlade' parameter is being received
        $viewBlade = $request->query('viewBlade');
        // \Log::info('viewBlade received: ' . $viewBlade);

        switch ($viewBlade) {
            case 'updateProfileForm':
                return view('profile.partials.update-profile-information-form', ['user' => $request->user()]);
            case 'updatePasswordForm':
                return view('profile.partials.update-password-form', ['user' => $request->user()]);
            default:
                return view('profile.edit', ['user' => $request->user()]);
        }
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // All responses for reloading the component
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'reload' => true,
                'component' => 'updateProfileForm',
                'redirect' => route('profile.edit'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "something went wrong!"
            ]);
        }

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
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
    
