<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // return back()->with('status', 'password-updated');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'reload' => true,
                'component' => 'updatePasswordForm',
                'redirect' => route('profile.edit'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "something went wrong!"
            ]);
        }
    }
}
