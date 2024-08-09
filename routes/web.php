<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Laravel\Sanctum\PersonalAccessTokenFactory;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Session::flush();
    return view('home');
})->name('logout');

Route::get('/loginView', function () {
    return view('login');
})->name('loginView');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/loginUser', [LoginController::class, 'login'])->name('loginUser');

Route::get('/setup', function () {
    $credentials = [
        'email' => 'yusdar@gmail.com',
        'password' => 'yusdar123',
    ];

    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();

        $user->name = 'Yusdar';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // $adminToken = $user->createToken('adminToken', ['create', 'update', 'delete']);
            $userToken = $user->createToken('userToken');

            return response()->json([
                'userToken' => $userToken->plainTextToken,
            ]);
        }
    } else {
        $response = [
            'status' => [
                'code' => '200',
                'description' => 'User already exist.',
            ],
        ];

        return response()->json($response);
    }
});
