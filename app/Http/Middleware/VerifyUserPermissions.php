<?php

namespace App\Http\Middleware;

use App\Models\Group;
use App\Models\Permission;
use Closure;

class VerifyUserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $action = \Request::route()->action['as'] ?? '';
        if (\Auth::user()) {
            $user = \Auth::user()->group_id;
            $routes_user = Permission::where('group_id', $user)->get();
            foreach ($routes_user as $value) {
                $permissions_user[] = $value->CreatedPermission->route;
            }
            
            // SE A PÁGINA SELECIONADA FOR A PÁGINA INICIAL
            if ($action == 'admin.index') {
                if (!in_array('admin.index', $permissions_user)) {

                    if (in_array('admin.file_manager.index', $permissions_user)) {
                        return redirect()->route('admin.file_manager.index');
                    } else {
                        return redirect()->route('withoutPermission');
                    }
                }
            } else {
                
                if (!in_array($action, $permissions_user)) {
                    return redirect()->route('withoutPermission');
                }
            }

        }
        
        return $next($request);
    }
}