<?php

namespace App\Http\Controllers;

use App\Models\MUserModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MUserController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            "username" => "required",
            "password" => "required",
        ]);
        if ($validator->fails()) return response()->json([
            'message' => $validator->errors()->first(),
            'code' => 400,
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $token = Auth::attempt($credentials);

        if (!empty($token)) {
            $user = MUserModel::where('m_user.username', $request->username)->first();
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            return response()->json([
                'message' => 'Berhasil login',
                'code' => 200,
                'data' => $this->respondWithToken($token)
            ]);
        }
        else {
            return response()->json([
                'message' => 'Username atau password anda salah',
                'code' => 400,
            ]);
        }
    }

    public function logout() {
        $token = Auth::logout();
        return response()->json([
            'message' => 'Berhasil logout',
            'code' => 200,
        ]);
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ];
    }
}
