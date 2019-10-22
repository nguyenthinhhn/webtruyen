<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MangaRepository;
use Yajra\Datatables\Datatables;
use App\Http\Requests\MangaRequest;
use App\Http\Requests\UpdateMangaRequest;
use App\Models\Manga;
use App\Models\Category;
use App\Models\CategoryManga;
use App\Models\Author;
use App\Models\AuthorManga;
use App\Models\Chapter;
use Goutte\Client;

class MangaController extends Controller
{
    protected $mangaRepository;

    public function __construct(MangaRepository $mangaRepository)
    { 
        $this->mangaRepository = $mangaRepository;
    }

    public function index(){

        return view('backend.manage_manga');
    }

    public function getList(){
        $manga = $this->mangaRepository->getAll();

        return Datatables::of($manga)->make(true);
    }

    public function store(MangaRequest $request) {
        $result = $this->mangaRepository->store($request);

        return response()->json([
            'error' => false,
            'message' => __('trans.Add success'),
        ]);
    }

    public function delete($id) {
        $result = $this->mangaRepository->delete($id);

        return response()->json([
            'message' => __('trans.Delete success'),
        ]);
    }
    public function updateStatus($id) {
        $result = $this->mangaRepository->updateStatus($id);

        if ($result == config('assets.is_active')) {
            $msg = __('trans.show manga');
        } else {
            $msg = __('trans.hidden manga');
        }

        return response()->json([
            'error' => false,
            'message' => $msg,
        ]);  
    }
    public function edit($id) {
        $result = $this->mangaRepository->find($id);

        return $result;
    }
    
    public function update(UpdateMangaRequest $request) {
        $result = $this->mangaRepository->updateManga($request);

        return response()->json([
            'error' => false,
            'message' => __('trans.Edit success'),
        ]);
    }

    public function crawler(Request $request) {
        // đọc dữ liệu từ url https://truyenqq.com
        $client = new Client();
        $crawler = $client->request('GET', $request->url);
        $name_manga = $crawler->filter('.center > h1')->text();
        $img = $crawler->filter('.left > img')->each(function ($node) {
            return $node->attr('src');
        })[0];
        $description = $crawler->filter('.story-detail-info > p')->text();

        //check xem truyện đã tồn tại chưa
        $mg = Manga::where('name', $name_manga)->first();
        if(!isset($mg)) {
            $data['rate'] = 0;
            $data['name'] = $name_manga;
            $data['total_rate'] = 0;
            $data['description'] = $description;
            $data['slug'] = str_slug($name_manga). time();
            $data['status'] = 1;
            $data['image'] = $img;
            $data['cover'] = 1;
            $manga = Manga::create($data);

            $catego = $crawler->filter('.list01 > .li03')->each(function ($node) {
                return $node->text();
            });
            foreach ($catego as $cate) {
                $category = Category::where('name', $cate)->first();
                if(!isset($category)) {
                    $categ['name'] = $cate;
                    $categ['slug'] = str_slug($cate);
                    $categ['meta_description'] = $cate;
                    $ct = Category::create($categ);

                    $catemanga['category_id'] = $ct->id;
                    $catemanga['manga_id'] = $manga->id;
                    CategoryManga::create($catemanga);
                } else {
                    $catemanga['category_id'] = $category->id;
                    $catemanga['manga_id'] = $manga->id;
                    CategoryManga::create($catemanga);
                }
            }
            $all_links = [];
            $links = $crawler->filter('.row > div > a')->links();
            foreach ($links as $link) {
                $all_links[] = $link->getURI();
            }
            $max = 0;
            if (count($all_links) < 7){
                $max = count($all_links);
            } else {
                $max = 5;
            }

            for($i = 0; $i < $max; $i++) {
                $clientc = new Client();
                $crawlerc = $clientc->request('GET', $all_links[$i]);
                $name_chapter = $crawlerc->filter('.detail-title')->text();
                $image = $crawlerc->filter('.story-see-content > img')->each(function ($node) {
                    return $node->attr('data-original');
                });
                $cont = "";
                for ($j = 0; $j < 5; $j++){
                    if($image[$j][0] == "h") {
                        $cont .= "<p><img alt='' src='{$image[$j]}' /></p>";
                    }
                }
                $ctg["name"] = $name_chapter;
                $ctg["view"] = 0;
                $ctg["status"] = 1;
                $ctg["slug"] = str_slug($name_chapter). time();
                $ctg["content"] = $cont;
                $ctg["description"] = "Đang cập nhật";
                $ctg["manga_id"] = $manga->id;
                $chap = Chapter::create($ctg);
            }

            return response()->json([
                'bug' => false,
                'message' => __('trans.Add success'),
            ]);
        }

        return response()->json([
            'bug' => true,
            'message' => __('trans.already exist'),
        ]);
    }

    public function CrowlerChapter(){

    }
}
