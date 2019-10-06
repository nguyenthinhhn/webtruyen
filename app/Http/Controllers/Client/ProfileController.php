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
        $user = Auth::user();

        return view('frontend.profile.info', [
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

    public function mangaFollow()
    {
        if (empty(Auth::user())) {

            return response()->view('errors/404');
        }
        $mangas = Auth::user()->mangas;

        return view('frontend.profile.follow', ['mangas' => $mangas]);
    }
}
