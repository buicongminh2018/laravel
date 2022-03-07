<?php

namespace App\Http\Controllers;

use App\Category;
use App\city;
use App\customer;
use App\Http\Requests\CustomerRequest;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class HomeController extends Controller
{
    private $category;
    private $product;
    private $slider;
    private $city;
    private $customer;
    public function __construct(Category $category,Product $product,Slider $slider,city $city,customer $customer)
    {
        $this->category=$category;
        $this->product=$product;
        $this->slider=$slider;
        $this->city=$city;
        $this->customer=$customer;


    }

    public function index(){

        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $products= $this->product->latest()->paginate(9);
        $slider= $this->slider->get();
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));
    }
    public  function filter_price(Request $request){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $slider= $this->slider->get();
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        if ($request->start_price == null && $request->end_price == null){
            $products= $this->product->latest()->paginate(9);
            return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));
        }else{
            $products= $this->product->latest()->whereBetween('product_price',[$request->start_price,$request->end_price])->paginate(9);
            return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));
        }

    }
    public function login(){
        return view('pages.home.login');
    }
    public function sign_up(){
        $city= $this->city->orderby('matp','ASC')->get();
        return view('pages.home.signup',compact('city'));

    }
    public function postlogin(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        $result = DB::table('customers')->where('customer_email',$customer_email)->where('customer_password', $customer_password)->first();
        if (!empty($result)){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_email',$result->customer_email);
            Session::put('customer_password',$result->customer_password);
            Session::put('customer_phone',$result->customer_phone);
            Session::put('customer_address',$result->customer_address);
            Session::put('customer_city',$result->customer_city);
            Session::put('customer_province',$result->customer_province);
            Session::put('customer_wards',$result->customer_wards);
            return redirect()->route('index');
        }else{
            Session::put('message','Email hoặc mật khẩu không chính xác, vui lòng nhập lại');
            return redirect()->route('HomeController.login');
        }
    }
    public function search(Request $request){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $keywords=$request->keyword;
        $products= $this->product->where('product_name','like','%' .$keywords. '%')->latest()->paginate(9);
        return view('pages.detailsproduct.search',compact('categoryParent','categoryChildren','products','cartSession'));
    }
    public function autocomplete(Request $request){
        $data = $request->all();
        $products= $this->product->where('product_name','like','%' .$data['query']. '%')->get();
        $output ='<ul class="dropdown-menu" style="display: block;margin: 0;margin-left: 14px;max-width: 400px">' ;
        foreach ($products as $key => $value){
            $output .='<li class="li_search"> <a href="#">'.$value->product_name.'</a> </li>';
        }
        $output .='</ul>';
        echo $output;



    }
    public function newproduct(){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $slider= $this->slider->get();
        $products= $this->product->orderBy('product_id','DESC')->paginate(9);
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));

    }
    public function oldproduct(){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $products= $this->product->orderBy('product_id','ASC')->paginate(9);
        $slider= $this->slider->get();
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));

    }
    public function priceincrease(){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $products= $this->product->orderBy('product_price','ASC')->paginate(9);
        $slider= $this->slider->get();
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));

    }
    public function reducedprice(){
        $categoryParent = $this->category->where('category_parent_id',0)->get();
        $categoryChildren = $this->category->get();
        $cartSession =session()->get('cart');
        $products= $this->product->orderBy('product_price','DESC')->paginate(9);
        $slider= $this->slider->get();
        $min_price=$this->product->min('product_price');
        $max_price=$this->product->max('product_price') +200000;
        return view('pages.home.home',compact('categoryParent','categoryChildren','products','cartSession','slider','min_price','max_price'));

    }

    public function updatePassword(){
        return view('pages.home.updatepassword');
    }
    public function postupdatePassword(Request $request){
        if ($request->customer_password_new != $request->customer_password_news){
            Session::put('message','Mật khẩu mới và mật khẩu mới nhập lại không trùng nhau,xin vui lòng nhập lại');
            return redirect()->route('HomeController.updatePassword');
        }
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);
        $customer = DB::table('customers')->where('customer_email',$customer_email)->where('customer_password', $customer_password)->first();
        if (isset($customer)){
            DB::table('customers')->where('customer_id',$customer->customer_id)->update(
                [
                    'customer_password' => md5($request->customer_password_new)
                ]
            );
            Session::put('messages','Đổi mật khẩu thành công');
            return redirect()->route('HomeController.updatePassword');
        }else{
            Session::put('message','Tài khoản và mật khẩu không đúng,xin vui lòng nhập lại');
            return redirect()->route('HomeController.updatePassword');
        }


    }
    public function addCustomer(CustomerRequest $request){
        if($request->customer_city != '0' && $request->customer_province != '0' && $request->customer_wards != '0' ){
            $this->customer->create([
                'customer_name'=>$request->customer_name,
                'customer_email'=>$request->customer_email,
                'customer_password'=> md5($request->customer_password),
                'customer_phone'=>$request->customer_phone,
                'customer_address'=>$request->customer_address,
                'customer_city'=>$request->customer_city,
                'customer_province'=>$request->customer_province,
                'customer_wards'=>$request->customer_wards
            ]);
            Session::put('message','Đăng ký thành công');
            return redirect()->route('HomeController.sign_up');
        }else{
            Session::put('messageErro','Vui lòng chọn Thành Phố,Quận/Huyện,Xã/Phường');
            return redirect()->route('HomeController.sign_up');
        }


    }

}
