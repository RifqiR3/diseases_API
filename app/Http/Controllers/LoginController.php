<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');

        if (!Auth::attempt($credentials)) {
            $user = new \App\Models\User();

            $user->name = $credentials['name'];
            $user->email = $credentials['email'];
            $user->password = Hash::make($credentials['password']);

            $user->save();

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // $adminToken = $user->createToken('adminToken', ['create', 'update', 'delete']);
                $userToken = $user->createToken('userToken');

                // Simpan data dalam sesi
                Session::put('notif', 'akun baru');
                Session::put('user', $user);
                Session::put('userToken', $userToken->plainTextToken);

                return view('home');
            }
        } else {
            $user = Auth::user();

            $user->tokens()->delete();
            $userToken = $user->createToken('userToken');

            Session::put('user', $user);
            Session::put('userToken', $userToken->plainTextToken);

            return view('home');
        }
    }
}
