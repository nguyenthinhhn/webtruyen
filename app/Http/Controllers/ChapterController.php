<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChapterRepository;
use Yajra\Datatables\Datatables;
use App\Http\Requests\ChapterRequest;

class ChapterController extends Controller
{
    protected $chapterRepository;

    public function __construct(ChapterRepository $chapterRepository)
    { 
        $this->chapterRepository = $chapterRepository;
    }

    public function index($id){

        return view('backend.manage_chapter', compact("id"));
    }

    public function getList($id){
        $chapter = $this->chapterRepository->getList($id);
        return Datatables::of($chapter)
        ->editColumn('content', function($chapter) {

            return strip_tags($chapter->content);
        })
        ->make(true);
    }

    public function store(ChapterRequest $request) {
    	$data = $request->all();
    	$data['status'] = config('assets.is_active');
    	$data['slug'] = str_slug($request->slug) . time();
        $result = $this->chapterRepository->create($data);

        return response()->json([
            'error' => false,
            'message' => __('trans.Add success'),
        ]);
    }
    
    public function delete($id) {
        $result = $this->chapterRepository->delete($id);

        return response()->json();
    }

    public function updateStatus($id) {
        $result = $this->chapterRepository->updateStatus($id);

        if ($result == config('assets.is_active')) {
            $msg = __('trans.show chapter');
        } else {
            $msg = __('trans.hidden chapter');
        }

        return response()->json([
            'error' => false,
            'message' => $msg,
        ]);  
    }

    public function edit($id) {
        $result = $this->chapterRepository->find($id);

        return $result;
    }

    public function update(ChapterRequest $request) {
        $result = $this->chapterRepository->update($request->id, $request->all());

        return response()->json([
            'error' => false,
            'message' => __('trans.Edit success'),
        ]);
    }
}
