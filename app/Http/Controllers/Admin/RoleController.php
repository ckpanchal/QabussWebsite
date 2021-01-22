<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\permission_category_connect;
use App\Models\permission_category;
use User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['role'] = Role::all();
        return view('Admin.Role.index', $data);
    }
    public function rolepermission($id)
    {
        $data = array(
            'role'          => Role::where('id', $id)->first(),
            'connection'    => permission_category_connect::all(),
            'category'      => permission_category::all(),
            'permissions'   => Permission::all(),
        );
        return view('Admin.Role.permission', $data);
    }
    public function rolepermissionupdate(Request $request, $id)
    {
        $user = $request->user;
        $user = Role::findById($user);
        $roles = $request->input('role');
        if(!empty($roles)){
            $val = count($roles);
            for ($i=0; $i < $val; $i++) {
                $user->givePermissionTo($roles[$i]);

            }
        }else{
            $user->syncPermissions();
        }
        // return $permission = Permission::findById(2);
        // $role = Role::findById(2);
        // $permission = Permission::findById(6);
        // $role->givePermissionTo($permission);
        // return redirect()->route('role.index');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Role.AddRole');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role = new Role();
        $role->name = $request->role;
        $role->guard_name = "web";
        $role->save();
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['role'] = Role::where('id', $id)->first();
        return view('Admin.Role.EditRole', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id)->first();
        $role->name = $request->role;

        $role->save();
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id', $id)->first();
        $permission = Permission::get();
        $val = count($permission);
        foreach ($permission as $dataVal){
            $id = $dataVal->id;
            $permission = Permission::findById($id);
            $permission->removeRole($role);
        }
        $role->delete();

        return redirect()->route('role.index');


        // $permission->removeRole($role);
        // return redirect()->route('role.index');

    }

    
}
