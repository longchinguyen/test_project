<?php

namespace App\Http\Middleware;

use App\Model\Permission;
use Closure;
use DB;
use App\Model\User;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        $listRoleOfUser = User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();
        $listRoleOfUser = DB::table('roles')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id', $listRoleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        $checkPermission = Permission::where('name', $permission)->value('id');
//        return $next($request);
        if ($listRoleOfUser->contains($checkPermission)) {
            return $next($request);
        }
        return redirect('user/error');


    }
}


