<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Traits\DeleteModel;
use DB;
use App\Components\dequydanhmuc;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    use DeleteModel;
    private  $category;
    public  function  __construct(Category $category){
        $this->category =$category;
    }
    public function index(){
        $categories = $this->category->latest()->get();
        return view('pagesadmin.admin.category.index',compact('categories'));
    }
    public function create(){
        $htmlChon = $this->getCategory($parentid="");
        return view('pagesadmin.admin.category.add',compact('htmlChon'));
    }
    public  function  getCategory($parentid){
        $data = $this->category->all();
        $dequydanhmuc = new dequydanhmuc($data);
        $htmlChon = $dequydanhmuc->categorydequy($parentid);
        return $htmlChon;
    }
    public function store(CategoryRequest $request){
        try {
            DB::beginTransaction();
            $this->category->create([
                'category_name'=>$request->category_name,
                'category_parent_id'=>$request->category_parent_id,
                'category_slug'=>str_slug($request->category_name)
            ]);
            DB::commit();
            return redirect()->route('categories.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());

        }
    }
    public function edit($id){
        $category = $this->category->where('category_id',$id)->first();
        $htmlChon = $this->getCategory($category->category_parent_id);
        return view('pagesadmin.admin.category.edit',compact('category','htmlChon'));
    }
    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $this->category->where('category_id',$id)->update([
                'category_name'=>$request->category_name,
                'category_parent_id'=>$request->category_parent_id,
                'category_slug'=>str_slug($request->category_name)
            ]);
            DB::commit();
            return redirect()->route('categories.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
        }

    }
    public function delete($id){

        return $this->deleteModeltrait($id,$this->category,'category_id');

    }


}
