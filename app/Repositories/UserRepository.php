<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function updateStatus($id)
    {
        $result = $this->_model->findOrFail($id);
        $result->status = 1 - $result->status;
        $result->save();

        return $result->status;
    }

    public function store($request){
        if ($request->hasFile('avatar')){     
            $path = $request->file('avatar')->store('public/images');
            $data['avatar'] = strstr( $path, '/' );
        }
        $data['username'] = $request->username;
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password1_add);
        $data['status'] = 1;
        $data['role_id'] = $request->role;
        $user = User::create($data);

        return $user;
    }

    public function updateUser($request)
    {
        $result = $this->find($request->id);
        if ($request->hasFile('avatar')){     
            $path = $request->file('avatar')->store('public/images');
            $result->avatar = strstr( $path, '/' );
        }
        $result->fullname = $request->fullname;
        $result->role_id = $request->role;
        $result->save();

        return $result;
    }
}
