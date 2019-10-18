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

        return response()->json();
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
        // đọc dữ liệu từ url
        $client = new Client();
        $crawler = $client->request('GET', $request->url);
        $name_manga = $crawler->filter('.title-detail')->text();
        $img = $crawler->filter('.col-image > img')->each(function ($node) {
            return $node->attr('src');
        })[0];
        $description = $crawler->filter('.detail-content > p')->text();

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

            $cate = $crawler->filter('.kind > p > a')->text();
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

            $all_links = [];
            $links = $crawler->filter('.row > .chapter > a')->links();
            foreach ($links as $link) {
                $all_links[] = $link->getURI();
            }
            $linkchapter = array_slice(array_reverse($all_links), count($all_links) - 10);

            for($i = 0; $i < 5; $i++) {
                $clientc = new Client();
                $crawlerc = $clientc->request('GET', $all_links[$i]);
                $name_chapter = $crawlerc->filter('.active > span')->text();
                $image = $crawlerc->filter('.page-chapter > img')->each(function ($node) {
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
                'error' => false,
                'message' => __('trans.Add success'),
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => __('trans.already exist'),
        ]);
    }

    public function CrowlerChapter(){

    }
}
