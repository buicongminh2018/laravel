<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModel;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    use DeleteModel;
    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
    }

    public function index(){
        $roles= $this->role->latest()->paginate(9);
        return view('pagesadmin.admin.role.index',compact('roles'));

    }
    public function create(){
        $permissionParents= $this->permission->where('parent_id',0)->get();
        $permissionChildren= $this->permission->all();
        return view('pagesadmin.admin.role.add',compact('permissionParents','permissionChildren'));
    }
    public function store(Request $request){
        $role = $this->role->create([
            'name'=>$request->name,
            'display_name'=>$request->display_name

        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');


    }
    public function edit($id){
        $permissionParents= $this->permission->where('parent_id',0)->get();
        $permissionChildren= $this->permission->all();
        $roles=$this->role->find($id);
        $permissionCheck= $roles->permissions;
        return view('pagesadmin.admin.role.edit',compact('roles','permissionParents','permissionChildren','permissionCheck'));

    }
    public function update(Request $request,$id){
        $this->role->find($id)->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name

        ]);
        $role=$this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');

    }
    public function delete($id){
        return $this->deleteModeltrait($id,$this->role,'id');
    }
}
