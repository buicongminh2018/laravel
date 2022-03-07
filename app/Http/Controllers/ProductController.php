<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\dequydanhmuc;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use App\Traits\DeleteModel;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Storage;
use Session;
use DB;

class ProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModel;
    private  $category;
    private $product;
    private $productImage;
    public  function  __construct(Category $category,Product $product,ProductImage $productImage){
        $this->category =$category;
        $this->product = $product;
        $this->productImage= $productImage;
    }

    public  function index(){
        $product= DB::table('products')->join('categories','products.category_id','=','categories.category_id')->orderBy('products.product_id', 'desc')->get();
        return view('pagesadmin.admin.product.index',compact('product'));
    }

    public  function  getCategory($parentid){
        $data = $this->category->all();
        $dequydanhmuc = new dequydanhmuc($data);
        $htmlChon = $dequydanhmuc->categorydequy($parentid);
        return $htmlChon;
    }
    public  function create(){
        $htmlChon = $this->getCategory($parentid="");
        return view('pagesadmin.admin.product.add',compact( 'htmlChon'));
    }
    public  function  store(ProductRequest $request){
        try {
            DB::beginTransaction();
                $category = $this->category->where('category_id',$request->category_id)->first();
                if ($category->category_parent_id != 0){
                    $category_parent_id=$category->category_parent_id;
                }else{
                    $category_parent_id =$request->category_id;
                }
            $dataCreateProduct =[
                'product_name'=> $request->product_name,
                'product_quantity'=> $request->product_quantity,
                'product_price'=> $request->product_price,
                'product_content'=> $request->product_content,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'category_parent_id'=>$category_parent_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'product_feature_image_path','product');
            if(!empty( $dataUploadFeatureImage)){
                $dataCreateProduct[ 'product_feature_image_name'] =$dataUploadFeatureImage['file_name'];
                $dataCreateProduct[ 'product_feature_image_path'] =$dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataCreateProduct);
            if($request->hasFile('product_image_path')){
                foreach ($request->product_image_path as $fileItem){
                    $dataProductImageDetail= $this->storageTraitUploadMulti($fileItem,'product');
                    $this->productImage->create([
                        'product_image_path'=>$dataProductImageDetail['file_path'],
                        'product_image_name'=> $dataProductImageDetail['file_name'],
                        'product_id'=> $product->product_id
                    ]);


                }

            }

            DB::commit();
            return redirect()->route('products.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
        }
    }

    public  function edit($id){
        $product = $this->product->where('product_id',$id)->first();
        $productImage= $this->productImage->where('product_id',$id)->get();
        $htmlChon = $this->getCategory($product->category_id);
        return view('pagesadmin.admin.product.edit',compact('htmlChon','product','productImage'));
    }
    public function  update(Request $request,$id){
        try {
            DB::beginTransaction();
            $category = $this->category->where('category_id',$request->category_id)->first();
            if ($category->category_parent_id != 0){
                $category_parent_id=$category->category_parent_id;
            }else{
                $category_parent_id =$request->category_id;
            }
            $dataUpdateProduct =[
                'product_name'=> $request->product_name,
                'product_quantity'=> $request->product_quantity,
                'product_price'=> $request->product_price,
                'product_content'=> $request->product_content,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'category_parent_id'=>$category_parent_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'product_feature_image_path','product');
            if(!empty( $dataUploadFeatureImage)){
                $dataUpdateProduct[ 'product_feature_image_name'] =$dataUploadFeatureImage['file_name'];
                $dataUpdateProduct[ 'product_feature_image_path'] =$dataUploadFeatureImage['file_path'];
            }
            $this->product->where('product_id',$id)->update($dataUpdateProduct);
            $product = $this->product->where('product_id',$id)->first();
            if($request->hasFile('product_image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->product_image_path as $fileItem){
                    $dataProductImageDetail= $this->storageTraitUploadMulti($fileItem,'product');
                    $this->productImage->create([
                        'product_image_path'=>$dataProductImageDetail['file_path'],
                        'product_image_name'=> $dataProductImageDetail['file_name'],
                        'product_id'=> $product->product_id
                    ]);

                }
            }
            DB::commit();
            return redirect()->route('products.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
        }


    }

    public function delete($id){
        $this->productImage->where('product_id',$id)->delete();
        return $this->deleteModeltrait($id,$this->product,'product_id');
    }

}
