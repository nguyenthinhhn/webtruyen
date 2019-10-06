<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    const ADMIN_ID = 1;
    const MOD_ID = 2;
    const MEMBER_ID = 3;
    const DOMAIN_MAIL = '@zimo.com';
    const KEY_SESSION_USER = 'users';

    public function __construct(UserRepository $userRepository)
    {
        $this->UserRepository = $userRepository;
    }

    public function loginProvider(Request $request)
    {
        $isNewUser = $request->isNewUser;
        $profile = $request->profile;
        $providerId = $request->providerId;
        if ($isNewUser === 'true') {
            $user = [
                'username' => isset($profile['email']) ? Str::before($profile['email'], '@') : $providerId . '_' . $profile['id'],
                'fullname' => $profile['name'],
                'email' => $profile['email'] ?? $profile['id'] . self::DOMAIN_MAIL,
                'password' => Hash::make($profile['id'] . self::DOMAIN_MAIL),
                'avatar' => $profile['picture']['data']['url'],
                'role_id' => self::MEMBER_ID,
            ];
            $user = $this->UserRepository->create($user);
        } else {
            $key = $profile['email'] ?? $profile['id'] . self::DOMAIN_MAIL;
            $user = User::where('email', $key)->firstOrFail();
        }

        if (isset($user->id)) {
            session([self::KEY_SESSION_USER => $user]);

            return response()->json([
                'status' => 'success',
                'messages' => null,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'messages' => null,
            ], 200);
        }
    }

    public function logout()
    {
        session()->forget(self::KEY_SESSION_USER);
        session()->flush();

        return redirect()->route('client.home');
    }
}
