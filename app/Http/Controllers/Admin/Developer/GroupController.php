<?php

namespace App\Http\Controllers\Admin\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\CreatedPermission;
use App\Models\Permission;

use App\Helpers\HelpersUsers;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function list()
    {
    	$groups = Group::orderBy('created_at', 'desc')->get();
    	return view('Admin.group.list', compact('groups'));
    }

    function edit(Request $req)
    {
        $data = $req->all();
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();
        $group = Group::find($data['id']);
        $group_permissions = $group->Permission;

        $permissions = [];
        foreach ($created_permissions as $created_permission) {
            $created_permission['select'] = 0;

            foreach ($group_permissions as $group_permission) {
                if ($created_permission->route == $group_permission->CreatedPermission->route) {
                    $created_permission['select'] = 1;
                }
            }

            array_push($permissions, $created_permission);
        }
        
        echo json_encode($permissions);
    	// return view('Admin.group.edit', compact('group', 'permissions'));
    }

    function update(Request $req)
    {
        $data = $req->all();
    	$group = Group::find($data['id']);
    	$data['group_id'] = $group->id;

    	// ATUALIZANDO GRUPO
    	$group->update($data);

        if (isset($data['id_permissions']) AND !empty($data['id_permissions'])) {
        	// EXCLUINDO PERMISSÕES ANTIGAS
        	foreach ($group->Permission as $permission_group) {
        		$permission_group->delete();
        	}

        	foreach ($data['id_permissions'] as $id_permission) {
        		$created_permission = CreatedPermission::find($id_permission);
        		$data['created_permission_id'] = $created_permission->id;
        		
        		Permission::create($data);
        	}
        }

    	return redirect()->route('admin.group.list');
    }

    function new()
    {
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();   
        return view('Admin.group.new', compact('created_permissions'));
    }

    function save(Request $req)
    {
        $data = $req->all();
        
        if (empty($data['name'])) $data['name'] = '';

        $group = Group::create($data);
        $data['group_id'] = $group->id;

        foreach ($data['id_permissions'] as $id_permission) {
            $created_permission = CreatedPermission::find($id_permission);
            $data['created_permission_id'] = $created_permission->id;
            
            Permission::create($data);
        }

        return redirect()->route('admin.group.list');
    }

    function delete(Request $req)
    {
        $data = $req->all();
        $group = Group::find($data['id']);

        $group->delete();
        return redirect()->route('admin.group.list');
    }

    function buscarGrupos()
    {
        $list_groups = Group::orderBy('created_at', 'desc')->get();
        foreach ($list_groups as $key => $value) {
            if ($value->name == 'Desenvolvedor') {
                if (!in_array('Developer', HelpersUsers::permissionsUser(\Auth::user()))) {
                    unset($list_groups[$key]);
                }
            }
        }

        return $list_groups;
    }
}
