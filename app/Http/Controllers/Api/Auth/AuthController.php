<?php
namespace App\Http\Controllers\Api\Auth;

use Auth;
use Illuminate\Auth\Events\Login;
use JWTAuth;
use App\User;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
class AuthController extends Controller {
    public function login(Request $request) {
        Log::debug("WHY?");
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }
        return response([
            'status' => 'success',
            'token' => $token,
            'user' => Auth::user()
        ]);
    }
}
