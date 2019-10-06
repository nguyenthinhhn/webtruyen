<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Yajra\Datatables\Datatables;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Auth;
use Hash;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function index(){

        return view('backend.manage_user');
    }

    public function getList(){
        $user = $this->userRepository->getAll();

        return Datatables::of($user)
        ->addIndexColumn()
        ->addColumn('action', function ($user) {
            $string = '';
            $string .= '<a href="#" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Sửa tài khoản" onclick="edit(' . $user->id . ');"><i class="fas fa-edit"></i></a>';
            $string .= '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Xóa Tài khoản khách hàng" onclick="deleteUser(' . $user->id . ');"><i class="fas fa-trash"></i></a>';

            return $string;
        })
        ->editColumn('fullname', function($user) {

            return str_limit($user->fullname, config('assets.legth_name'), ' ...');
        })
        ->editColumn('created_at', function($user) {

             return $user->created_at->format('Y-m-d');
        })
        ->editColumn('avatar', function($user) {
            if (isset($user->avatar)) {
                return '<div class="imgList">
                        <img width= "60px;" src="' . asset(config('assets.storage')) . $user->avatar . '" alt="">    
                    </div>';  
            } else {
                return '<div class="imgList"><img width= "60px;" src="' . asset(config('assets.avatar_default')) . '" alt=""></div>';
            }
        })
        ->editColumn('email', function ($user) {
            return '<a href="mailto:' . $user->email . '">' . $user->email . '</a>';
        })
        ->editColumn('status', function($user) {
            $checked = '';
            if ($user->status == config('assets.is_active')) {
                $checked = 'checked';
            }

            return '<label class="switch" onchange="updateStatus(' . $user->id . ');"><input type="checkbox"' . $checked . '><span class="slider round"></span></label>';
        })
        ->addColumn('role', function ($user) {

            return $user->role->title;
        })
        ->rawColumns(['status', 'avatar', 'action', 'email'])
        ->make(true);
    }

    public function updateStatus($id) {
        $result = $this->userRepository->updateStatus($id);

        if ($result == config('assets.is_active')) {
            $msg = __('trans.Open account successfully');
        } else {
            $msg = __('trans.Lock account successful');
        }

        return response()->json([
            'error' => false,
            'message' => $msg,
        ]);  
    }

    public function delete($id) {
        $result = $this->userRepository->delete($id);

        return response()->json();
    }
    
    public function store(UserRequest $request) {
        $result = $this->userRepository->store($request);

        return response()->json([
            'error' => false,
            'message' => __('trans.Add success user'),
        ]);
    }

    public function edit($id) {
        $result = $this->userRepository->find($id);

        return $result;
    }

    public function update(UserUpdateRequest $request) {
        $result = $this->userRepository->updateUser($request);

        return response()->json([
            'error' => false,
            'message' => __('trans.Edit success user'),
        ]);
    }

    public function profile(){
        $user = Auth::user();
        
        return view('backend.profile', compact('user'));    
    }

    public function updateProfile(Request $request)
    {
        $result = $this->userRepository->update(Auth::user()->id, $request->all());

        return response()->json([
            'error' => false,
            'message' => __('trans.Edit success user'),
        ]);
    }

    public function updatePassword(Request $request)
    {
        if (Hash::check($request->pw1, Auth::user()->password)) {
            $data['password'] = bcrypt($request->pw2);
            $result = $this->userRepository->update(Auth::user()->id, $data);

            return response()->json([
                'error' => false,
                'message' => __('trans.Edit success password'),
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => __('trans.Edit error password'),
        ]);
    }
}
