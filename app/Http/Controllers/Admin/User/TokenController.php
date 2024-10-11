<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function generateFixedToken(Request $request)
    {
        $userId = $request->input('user_id');
        if (!$userId) {
            return back()->withErrors(['error' => 'User ID is missing']);
        }
        $user = User::find($userId);
        if (!$user) {
            return back()->withErrors(['error' => 'User not found']);
        }
        $realToken = $user->createToken('fixed-api-token')->plainTextToken;

        return redirect()->route('admin.user.index')
            ->with('realToken', $realToken)
            ->with('userId' , $user->id)
            ->with('success', 'Token generated successfully');
    }
}
