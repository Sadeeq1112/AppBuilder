<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Menus;
use View;
use App\Models\Settings;
use Schema;
use DB;
class InitialData
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
         try{
        if(Schema::hasTable('Settings')){
            $Settings=Settings::where('id',1)->first();
            View::share('settings', $Settings);    
        }
        

        if (Schema::hasTable('users') && Auth::user()):
            $UserPermissionsNames=[];
            $UserRoles = Auth::user()->roles;
            //dd($UserRoles );
            foreach ($UserRoles as $role) {
                foreach ($role->permissions as $permission):$UserPermissionsNames[] = $permission->name;
                endforeach;
            }
            //Get Menu Items
            $AllMenuItems = Menus::orderBy('parent','asc')->whereIn('permission_name',$UserPermissionsNames)
                    ->orWhere('type','menuItem')->orderBy('hierarchy','asc')->get();
            $AllMenuItemsArray=  $this->GetParentChildrenMenu($AllMenuItems);
            View::share('all_menu_items', $AllMenuItemsArray);
            View::share('user_permissions_names', $UserPermissionsNames);
        endif;
         }
	catch(\Exception $e){
            dd($e);
        }
        return $next($request);
    }
     protected function GetParentChildrenMenu($AllMenuItems)
    {
        $FinalMenuItems=array();
        foreach($AllMenuItems as $MenuItem)
        {
            if($MenuItem->parent==0):
            $FinalMenuItems[$MenuItem->id]=$MenuItem->toArray();
            $FinalMenuItems[$MenuItem->id]['children']=array();
            else:
            $FinalMenuItems[$MenuItem->parent]['children'][]=$MenuItem->toArray();    
            endif;
        }
        return $FinalMenuItems;
    }
}
