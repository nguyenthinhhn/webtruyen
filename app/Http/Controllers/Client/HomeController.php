<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Manga;
use App\Repositories\MangaRepository;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    protected $mangaRepository;

    public function __construct(MangaRepository $mangaRepository)
    {
        $this->mangaRepository = $mangaRepository;
    }

    public function index()
    {
        $manganew = $this->mangaRepository->getLimit();
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.home', compact('manganew', 'top5view'));
    }

    public function getCategory($cate)
    {
        $manganew = $this->mangaRepository->getCategory($cate);
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.category', compact('manganew', 'top5view'));
    }

    public function getManga($slug)
    {
        $manga = $this->mangaRepository->getManga($slug);
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));
        $suggest = $this->mangaRepository->getCategory($manga->categories[0]->slug);
        $view = $this->mangaRepository->countView($manga);
        $status = 0;
        if (!empty(session('users'))) {
            $status = $this->mangaRepository->checkFollow($manga->id);
        }

        return view('frontend.detail', compact('manga', 'top5view', 'suggest', 'status'));
    }

    public function getChapter($slug_manga, $slug_chapter)
    {
        $manga = $this->mangaRepository->getManga($slug_manga);
        $listchapter = $manga->chapters;
        $chapter = $this->mangaRepository->getChapter($slug_chapter);

        return view('frontend.chapter', compact('manga', 'chapter', 'listchapter'));
    }

    public function comment(Request $request)
    {
        $result = $this->mangaRepository->createComment($request->all());

        return $result;
    }

    public function follow($id)
    {
        if (empty(Auth::user())) {

            return response()->json([
                'error' => true,
                'message' => __('trans.is login'),
            ]);
        }
        $result = $this->mangaRepository->follow($id);

        if ($result) {

            return __('trans.Is follow');
        } else {

            return __('trans.unfollow');
        }
    }

    public function listFollow()
    {
        if (empty(Auth::user())) {
            
            return response()->view('errors/404');
        }
        $manganew = Auth::user()->mangas;
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.follow', compact('manganew', 'top5view'));
    }

    public function searchFullText(Request $request)
    {
        if ($request->search != '') {
            $data = Manga::FullTextSearch('name', $request->search)->get();

            return $data;
        }
    }

    public function switchLanguage($language)
    {
        session([
            'language' => $language
        ]);

        return redirect(url()->previous());
    }

    public function rating(Request $request)
    {
        $manga = Manga::find($request->manga_id);
        if ($manga) {
            $manga->total_rate += 1;
            $manga->rate += $request->rating;
            $manga->save();

            return response([
                'status' => 'success',
                'messages' => null,
                'data' => null,
            ]);
        }

        return response([
            'status' => 'danger',
            'messages' => null,
            'data' => null,
        ]);
    }
}
