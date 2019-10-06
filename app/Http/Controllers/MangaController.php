<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MangaRepository;
use Yajra\Datatables\Datatables;
use App\Http\Requests\MangaRequest;
use App\Http\Requests\UpdateMangaRequest;

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
}
