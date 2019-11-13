<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;

use App\Helpers\HelpersUsers;

use App\Http\Requests\User\newUser;

use Auth;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    function login(Request $req)
    {
        $data = $req->all();
        
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email'=>$data['username'], 'password'=>$data['password']]))
        {
            return redirect()->route('admin.index');
        }
        
        if (Auth::attempt(['login'=>$data['username'], 'password'=>$data['password']]))
        {
            return redirect()->route('admin.index');
        }

        $messages = [
            'required' => 'Registro não encontrado',
        ];        

        Validator::make($data, [
            'auth' => 'required',
        ], $messages)->validate();
    }

	function list()
	{
        $users = User::orderBy('created_at', 'desc')->get();
		$groups = Group::orderBy('created_at', 'desc')->get();

		return view('Admin.user.list', compact('users', 'groups'));
	}

	function new()
	{
		$groups = Group::orderBy('created_at', 'desc')->get();
		return view('Admin.user.new', compact('groups'));
	}

	function save(newUser $req)
	{
        $data = $req->all();

        if (!isset($data['group_id'])) {
            $data['group_id'] = 3;
        }
		if ($data['password'] == null) {
            $data['password'] = bcrypt('123mudar');
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        if ($data['first_name'] == null) $data['first_name'] = '';  
        if ($data['last_name'] == null) $data['last_name'] = '';
        if ($data['email'] == null) $data['email'] = '';  

		User::Create($data);

        if (\Auth::user()) {
            return redirect()->route('admin.user.list');
        } else {
            return redirect()->route('login');
        }
	}

    function update(Request $req)
    {
        $data = $req->all();

        $req->validate([
            'first_name'=>'required',
            'last_name'=>'',
            'password'=>'',
            'email'=>'required',
            'login'=>'max:10' 
        ]);

        $user = User::find($data['id']);

        if ($data['first_name'] == null) {
            $data['first_name'] = '';
        }
        if ($data['last_name'] == null) {
            $data['last_name'] = '';
        }

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('admin.user.edit', $user->id);
    }

    function edit($id)
    {

        if (\Auth::user()->id != $id)
        {
            if (!in_array('admin.users.edit_other_users', HelpersUsers::permissionsUser()) OR 
                !in_array('Developer', HelpersUsers::permissionsUser())
            ) {
                return redirect()->route('admin.index');
            }
        }

    	$groups = Group::orderBy('created_at', 'desc')->get();
    	$user = User::find($id);

    	return view('Admin.user.edit', compact('groups', 'user'));
    }

    function delete(Request $req)
    {
        $data = $req->all();
        $user = User::find($data['id']);

        $user->delete();
        return redirect()->route('admin.user.list');
    }
}
