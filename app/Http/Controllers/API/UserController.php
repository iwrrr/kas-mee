<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            // Cek credentials (login)
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            // Validasi user
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => $this->passwordRules()
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.unique' => 'Email telah digunakan',
                    'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai',
                ]
            );

            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Something went wrong',
                    'error' => $validator->messages()->first(),
                ], 'Authentication Failed', 500);
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone_number' => $request->phone_number,
                ]);

                $user = User::where('email', $request->email)->first();

                $tokenResult = $user->createToken('authToken')->plainTextToken;

                return ResponseFormatter::success([
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]);
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }

    public function updateProfile(UserRequest $request)
    {
        $params = $request->validated();
        $user = Auth::user();

        if (!$params['password']) {
            unset($params['password']);
        } else {
            $params['password'] = Hash::make($params['password']);
            $user->update($params);
        }

        return ResponseFormatter::success($user, 'Profile Updated');
    }

    public function uploadPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error([
                'error' => $validator->errors()
            ], 'Update photo fails', 401);
        }

        if ($request->file('image')) {
            $file = $request->file('image');

            $now = date('m/d/Y H:i:s', time());
            $out = substr(hash('md5', $now), 0, 12);

            $fileName = $out . '.' . $file->getClientOriginalExtension();
            $folder = '/uploads/user';
            $filePath = $file->storeAs($folder, $fileName, 'public');

            // // Simpan url foto ke database
            $user = Auth::user();
            $user->profile_photo_path = $filePath;
            $user->update();

            return ResponseFormatter::success($file, 'File successfully uploaded');
        }
    }
}
