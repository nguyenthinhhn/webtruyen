<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){

        return view('backend.manage_category');
    }

    public function getList(){
        $category = $this->categoryRepository->getAll();

        return Datatables::of($category)
        ->addIndexColumn()
        ->addColumn('action', function ($category) {
            $string = '';
            $string .= '<a href="#" class="btn btn-xs btn-warning" data-toggle="tooltip"  onclick="edit(' . $category->id . ');"><i class="fas fa-edit"></i></a>';
            $string .= '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" onclick="deleteCategory(' . $category->id . ');"><i class="fas fa-trash"></i></a>';

            return $string;
        })
        ->editColumn('name', function($category) {

            return str_limit($category->name, config('assets.legth_name'), ' ...');
        })
        ->editColumn('created_at', function($category) {

            return $category->created_at->format('Y-m-d');
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function delete($id) {
        $result = $this->categoryRepository->delete($id);

        return response()->json([
            'error' => false,
            'message' => __('trans.Delete success'),
        ]);
    }

    public function store(CategoryRequest $request){
        $result = $this->categoryRepository->create($request->all());

        return response()->json([
            'error' => false,
            'message' => __('trans.Add success category'),
        ]);
    }

    public function edit($id) {
        $result = $this->categoryRepository->find($id);

        return $result;
    }

    public function update(CategoryRequest $request) {
        $result = $this->categoryRepository->update($request->id, $request->all());
    
        return response()->json([
            'error' => false,
            'message' => __('trans.Edit success'),
        ]);
    }
}
