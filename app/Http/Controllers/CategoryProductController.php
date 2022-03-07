<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    private $category;
    private $product;
    public function __construct(Category $category,Product $product)
    {
        $this->category=$category;
        $this->product=$product;

    }

    public function showCategoryHome($slug){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        $cartSession =session()->get('cart');
        if($category->category_parent_id != 0){
            $products= $this->product->where('category_id',$id)->latest()->paginate(9);
        }else{
            $products= $this->product->where('category_parent_id',$id)->latest()->paginate(9);
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
    public function filter_price($slug,Request $request){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        $cartSession =session()->get('cart');
        if ($request->start_price == null && $request->end_price == null) {
            if($category->category_parent_id != 0){
                $products= $this->product->where('category_id',$id)->latest()->paginate(9);
            }else{
                $products= $this->product->where('category_parent_id',$id)->latest()->paginate(9);
            }
        }else{
            if($category->category_parent_id != 0){
                $products= $this->product->where('category_id',$id)->whereBetween('product_price',[$request->start_price,$request->end_price])->latest()->paginate(9);
            }else{
                $products= $this->product->where('category_parent_id',$id)->whereBetween('product_price',[$request->start_price,$request->end_price])->latest()->paginate(9);
            }
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
    public function newproduct($slug){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $cartSession =session()->get('cart');
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        if($category->category_parent_id != 0){
            $products= $this->product->where('category_id',$id)->orderBy('product_id','DESC')->paginate(9);
        }else{
            $products= $this->product->where('category_parent_id',$id)->orderBy('product_id','DESC')->paginate(9);
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
    public function oldproduct($slug){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $cartSession =session()->get('cart');
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        if($category->category_parent_id != 0){
            $products= $this->product->where('category_id',$id)->orderBy('product_id','ASC')->paginate(9);
        }else{
            $products= $this->product->where('category_parent_id',$id)->orderBy('product_id','ASC')->paginate(9);
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
    public function priceincrease($slug){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $cartSession =session()->get('cart');
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        if($category->category_parent_id != 0){
            $products= $this->product->where('category_id',$id)->orderBy('product_price','ASC')->paginate(9);
        }else{
            $products= $this->product->where('category_parent_id',$id)->orderBy('product_price','ASC')->paginate(9);
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
    public function reducedprice($slug){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $category=$this->category->where('category_slug',$slug)->first();
        $id=$category->category_id;
        $cartSession =session()->get('cart');
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        if($category->category_parent_id != 0){
            $products= $this->product->where('category_id',$id)->orderBy('product_price','DESC')->paginate(9);
        }else{
            $products= $this->product->where('category_parent_id',$id)->orderBy('product_price','DESC')->paginate(9);
        }
        return view('pages.category.index',compact('categoryParent','categoryChildren','products','cartSession','category','min_price','max_price'));

    }
}
