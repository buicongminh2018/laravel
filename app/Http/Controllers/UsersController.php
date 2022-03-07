<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModel;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    use DeleteModel;
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user= $user;
        $this->role= $role;
    }
    public function index(){
        $users= $this->user->latest()->get();
        return view('pagesadmin.admin.user.index',compact('users'));

    }
    public function create(){
        $roles=$this->role->all();
        return view('pagesadmin.admin.user.add',compact('roles'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
                'user_phone'=>$request->user_phone
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . ' line: ' .$exception->getLine());

        }

    }

    public function edit($id){
        $users = $this->user->find($id);
        $roles=$this->role->all();
        $roleUser=$users->roles;
        return view('pagesadmin.admin.user.edit',compact('users','roles','roleUser'));

    }
    public function update(Request $request,$id){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
                'user_phone'=>$request->user_phone
            ]);
            $user=$this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . ' line: ' .$exception->getLine());

        }

    }
    public function delete($id){
        return $this->deleteModeltrait($id,$this->user,'id');
    }
}
