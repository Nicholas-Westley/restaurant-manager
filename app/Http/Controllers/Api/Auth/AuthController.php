<?php
namespace App\Http\Controllers\Api\Auth;

use Auth;
use JWTAuth;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use App\SettingValue;

class AuthController extends Controller {
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }

        $settings = SettingValue::whereUserId(auth()->id())
            ->with('setting')
            ->with('setting.settingOptions')
            ->get();

        return response([
            'status' => 'success',
            'token' => $token,
            'user' => Auth::user(),
            'settings' => $settings
        ]);
    }
}
