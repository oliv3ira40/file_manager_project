<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Group;
use App\Models\CreatedPermission;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    function withoutPermission()
    {
        return view('Admin.error.without_permission');
    }

    function register(Request $req)
    {
        $data = $req->all();
        $authentication = false;
        $msg_error = false;

        // dd($data);
        if (!empty($data) AND isset($data['user_id'])) {
            
            $user = User::find($data['user_id']);
            $data['password'] = bcrypt($data['password']);
            
            $user->update($data);
            return redirect()->route('login');
        }

        if (!empty($data) AND isset($data['cpf/registration'])) {
            
            $data['cpf/registration'] = str_replace(['.', '-'], '', $data['cpf/registration']);
            $users = User::all();
            
            $user_filter = 0;
            foreach ($users as $user) {
                $cpf_user = str_replace(['.', '-'], '', $user->cpf);
                $registration_user = str_replace(['.', '-'], '', $user->registration);

                if ($data['cpf/registration'] == $cpf_user or $data['cpf/registration'] == $registration_user) {
                    $authentication = true;
                    
                    $user_filter = $user;
                }
            }
        }
        
        return view('auth.register', compact('authentication', 'user_filter'));
    }
}