<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Repositories\RoleRepository;
use App\Models\PermissionRole;
use Auth;
use DB;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(){

        return view('backend.manage_role');
    }

    public function getList(){
        $role = $this->roleRepository->getAll();

        return Datatables::of($role)
        ->addIndexColumn()
        ->editColumn('permission', function($role) {

            return $role->permissions;
        })        
        ->editColumn('created_at', function($role) {

            return $role->created_at->format('Y-m-d');
        })
        ->rawColumns(['permission'])
        ->make(true);
    }

    public function addpermisson(Request $request){
        $row = PermissionRole::where('role_id', $request->role_id)->where('permission_id', $request->permission_id)->first();
        if (isset($row)) {

            return response()->json([
                'error' => true,
                'message' => __('trans.Add permission error'),
            ]);
        } else {
            $permission = PermissionRole::create($request->all());

            return response()->json([
                'error' => false,
                'message' => __('trans.Add permission success'),
            ]);
        }
    }

    public function deletePermission($role_id, $permission_id){
        $row = PermissionRole::where('role_id', $role_id)->where('permission_id', $permission_id)->delete();
        if (!isset($row)) {

            return response()->json([
                'error' => true,
                'message' => __('trans.Delete error'),
            ]);
        } else {

            return response()->json([
                'error' => false,
                'message' => __('trans.Delete success'),
            ]);
        }
    }

    public function store(Request $request) {

            $result = $this->roleRepository->create($request->all());
            
            return response()->json([
                'error' => false,
                'message' => __('trans.Add success'),
            ]);
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $result = $this->roleRepository->delete($id);
            $row = PermissionRole::where('role_id', $id)->delete();
            DB::commit();

            return response()->json([
                'error' => false,
                'message' => __('trans.Delete success'),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
