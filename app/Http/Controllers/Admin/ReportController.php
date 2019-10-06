<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    const ACTIVE = 1;
    const DISABLE = -1;
    protected $_model;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->_model = app()->make('App\Models\Report');
    }

    public function index()
    {
        return view('backend.reports.index');
    }

    public function dataTable(Request $request)
    {
        $request = $request->all();
        $page = $request['pagination']['page'] - 1;
        $pageSize = $request['pagination']['perpage'];
        $result = $this->_model->skip($page * $pageSize)->take($pageSize);
        if (isset($request['sort'])) {
            $order = $request['sort'];
            $order ? $result->orderBy($order['field'], $order['sort']) : null;
        }
        if (isset($request['query'])) {
            foreach ($request['query'] as $key => $item) {
                $result->where($key, $item);
            }
        }
        $result = $result->get();
        $countRow = $result->count();
        $structData = [
            'data' => $result,
            'meta' => [
                'field' => $order['field'] ?? 'id',
                'page' => $page,
                'pages' => (int)($countRow / $pageSize),
                'perpage' => $pageSize,
                'sort' => $order['sort'] ?? 'asc',
                'total' => $countRow,
            ],
        ];

        return response()->json($structData, 200);
    }
}
