<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Repositories\DataRepository;

class DatabaseController extends Controller
{
	protected $dataRepository;
    protected $process;

    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
        $this->middleware('auth');
    }

    public function index() {
        return view('backend.manage_data');
    }

    public function getList() {
        $backup = $this->dataRepository->getAll();

        return Datatables::of($backup)->addIndexColumn()->make(true);
    }

    public function backup($id) {
    	$result = $this->dataRepository->backup($id);
    	if ($result) {
	    	return response()->json([
	            'error' => false,
	            'message' => __('trans.Backup success'),
	        ]);
	    } else {
            return response()->json([
	            'error' => true,
	            'message' => __('trans.Backup error'),
	        ]);
        }
    }
}
