<?php

namespace App\Http\Controllers\Admin\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\CreatedPermission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    function list()
    {
    	$permissions = CreatedPermission::orderBy('created_at', 'desc')->get();
        // dd($permissions);
    	
        return view('Admin.permission.list', compact('permissions'));
    }

    function new()
    {
    	return view('Admin.permission.new');
    }

    function save(Request $req)
    {
    	$data = $req->all();
    	
    	// SEPARANDO CONTEUDO
    	$names_routes = explode('//', $data['route/name']);
    	$data['names_routes'] = [];
    	foreach ($names_routes as $name_route) {
    		$n = explode('=', $name_route);
    		array_push($data['names_routes'], $n);
    	};
    	// SEPARANDO CONTEUDO
    	
    	// SALVANDO TODAS PERMISSÕES COM AS DEVIDAS ROTAS
    	foreach ($data['names_routes'] as $data['name_route']) {
	    	$data['name'] = $data['name_route'][0];
	    	$data['route'] = $data['name_route'][1];
	    	
	    	CreatedPermission::create($data);
    	}
    	// SALVANDO TODAS PERMISSÕES COM AS DEVIDAS ROTAS

    	return redirect()->route('admin.group.list');
    }

    function edit($id)
    {
        $permission = CreatedPermission::find($id);

        return view('Admin.permission.edit', compact('permission'));
    }

    function update(Request $req, $id = null)
    {
        $data = $req->all();
        if (isset($id) AND !empty($id)) {
            $permission = CreatedPermission::find($id);
        } else {
            $permission = CreatedPermission::find($data['id']);
        }

        $permission->update($data);
        return redirect()->route('admin.permission.list');        
    }

    function delete(Request $req)
    {
        $data = $req->all();
        $permission = CreatedPermission::find($data['id']);
        
        $permission->delete();
        return redirect()->route('admin.permission.list');
    }
}
