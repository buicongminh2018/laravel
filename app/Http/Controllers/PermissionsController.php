<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function create(){
        return view('pagesadmin.admin.permission.add');
    }
    public function store(Request $request){
        $permission = $this->permission->create(
            [
                'name' => $request->moduleParent,
                'display_name'=>$request->moduleParent,
                'parent_id'=>0
            ]
        );
            foreach ($request->moduleChildrent as $value){
                $this->permission->create(
                    [
                        'name' =>$value,
                        'display_name'=>$value,
                        'parent_id'=> $permission->id,
                        'key_code'=>$request->moduleParent . '_' . $value

                    ]
                );

        }
        return redirect()->to('adminIndex');
    }
}
