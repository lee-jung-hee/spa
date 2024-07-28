<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase() // 대문자와 소문자를 모두 포함
                    ->numbers()   // 숫자를 포함
                // ->symbols()   // 특수문자를 포함
            ],
        ]));
        Auth::login($user);

        return redirect()->route('listing.index')
            ->with('success', '계정 생성이 완료되었습니다');
    }
}
