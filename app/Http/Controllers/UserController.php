<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UserController extends Controller
{
    protected $userModel;
    protected $roleModel;

    public function __construct(User $userModel, Role $roleModel) {
        $this->userModel = $userModel;
        $this->roleModel = $roleModel;
    }
    
    public function manage(Request $request)
    {
        $request->user()->authorizeRoles(['adminstrator', 'super_admin']);

        $userData = $this->userModel->get();
        $roleData = $this->roleModel->get();
        
        return view('user.manage', compact('userData', 'roleData'));
    }

    public function add(Request $request)
    {
        $request->user()->authorizeRoles(['adminstrator', 'super_admin']);
        $roleData = $this->roleModel->get();
        
        return view('user.add', compact('roleData'));
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['adminstrator', 'super_admin']);
        $userData = $this->userModel->whereId($id)->get();
        $roleData = $this->roleModel->get();
        
        return view('user.edit', compact('userData','roleData', 'id'));
    }

    public function update(Request $request, $id)
    {
        $userData = $request->except(['_token', 'password']);
        $userData['password'] = Hash::make($request->password);

        if($user = $this->userModel->whereId($id)->first()) {
            $user->update($userData);
            $user->roles()->attach($request->role_id);
        }

        return redirect('user');  
    }

    public function store(Request $request)
    {
        $userData = $request->except(['_token', 'password', 'role_id']);
        $userData['password'] = Hash::make($request->password);

        $user = $this->userModel->create($userData);
        $user->roles()->attach($request->role_id);

        return redirect('user');
    }

    public function destroy($id)
    {
        $user = $this->userModel->find($id);
        if($user) {
            $user->delete();
            return redirect()->back();
        }
    }
}
