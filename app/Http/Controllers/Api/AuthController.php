<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CfmToken;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    /**
     * Foydalanuvchi login so‘rovi (telefon orqali kod yuboriladi)
     */
    public function requestUserLogin(Request $request){
        $request->validate([
            'phone' => 'required|string|regex:/^\+998[0-9]{9}$/'
        ]);
        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            ['type' => 'user', 'status' => 'waiting']
        );

        $code = rand(10000, 99999);
        $user->code = $code;
        $user->save();

        // ❌ Kodni response’da qaytarmaymiz (faqat SMS xizmatiga yuboriladi)
        // SmsService::send($user->phone, "Tasdiqlash kodi: $code");

        return response()->json([
            'message' => 'Tasdiqlash kodi yuborildi'
        ]);
    }
    /**
     * Foydalanuvchi kodni kiritib login bo‘ladi
     */
    public function verifyUserCode(Request $request){
        $request->validate([
            'phone' => 'required|string|regex:/^\+998[0-9]{9}$/',
            'code' => 'required|numeric',
            'cfm_token' => 'required|string',
        ]);
        $user = User::where('phone', $request->phone)->first();
        if (!$user || $user->code !== $request->code) {
            return response()->json(['message' => 'Kod noto‘g‘ri'], 401);
        }
        $user->status = true;
        $user->code = null;
        $user->save();
        $user->tokens()->delete();
        $token = $user->createToken('user_token')->plainTextToken;
        CfmToken::where('user_id', $user->id)->delete();
        CfmToken::create([
            'user_id'   => $user->id,
            'cfm_token' => $request->cfm_token,
        ]);
        return response()->json([
            'message' => 'Muvaffaqiyatli login',
            'token'   => $token,
            'user'    => $user
        ]);
    }
    /**
     * Hodim login bo‘ladi (email + parol orqali)
     */
    public function staffLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'cfm_token' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email yoki parol noto‘g‘ri'], 401);
        }
        if ($user->type === 'user') {
            return response()->json(['message' => 'Faqat hodimlar uchun'], 403);
        }
        if ($user->status !== true) {
            return response()->json(['message' => 'Faqat aktiv hodimlar uchun'], 403);
        }
        $user->tokens()->delete();
        $token = $user->createToken('staff_token')->plainTextToken;
        CfmToken::where('user_id', $user->id)->delete();
        CfmToken::create([
            'user_id'   => $user->id,
            'cfm_token' => $request->cfm_token,
        ]);
        return response()->json([
            'message' => 'Muvaffaqiyatli login',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    public function checkToken(Request $request){
        return response()->json([
            'status' => true,
            'message' => 'Token aktiv',
            'user' => $request->user()
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Logout muvaffaqiyatli bajarildi'
        ], 200);
    }


}
