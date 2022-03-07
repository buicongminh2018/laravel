<?php

namespace App\Http\Controllers;

use App\city;
use App\customer;
use App\Http\Requests\CustomerRequest;
use App\order;
use App\order_detail;
use App\payment;
use App\phi_ship;
use App\shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Session;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    private $customer;
    private $shipping;
    private $payment;
    private $order;
    private $order_detail;
    private $city;
    private $phi_ship;
    public function __construct(phi_ship $phi_ship,customer $customer,shipping $shipping,payment $payment,order $order,order_detail $order_detail,city $city)
    {
        $this->customer=$customer;
        $this->shipping=$shipping;
        $this->payment=$payment;
        $this->order=$order;
        $this->order_detail=$order_detail;
        $this->city=$city;
        $this->phi_ship=$phi_ship;

    }

    public function logincheckout(){
        return view('pages.checkout.loginCheckout');
    }
    public function postlogincheckout(Request $request){
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
            return redirect()->route('Checkout.checkout');
        }else{
            Session::put('message','Email hoặc mật khẩu không chính xác, vui lòng nhập lại');
            return redirect()->route('Checkout.logincheckout');
        }

    }
    public function signup(){
        $city= $this->city->orderby('matp','ASC')->get();
        return view('pages.checkout.signUp',compact('city'));
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
            return redirect()->route('Checkout.signup');
        }else{
            Session::put('messageErro','Vui lòng chọn Thành Phố,Quận/Huyện,Xã/Phường');
            return redirect()->route('Checkout.signup');
        }


    }
    public function checkout(){
        $cartSession =session()->get('cart');
        $city= $this->city->orderby('matp','ASC')->get();
        return view('pages.checkout.checkout',compact('cartSession','city'));
    }
    public function payment(){
        $cartSession =session()->get('cart');
        return view('pages.payment.index',compact('cartSession'));
    }
    public function postlogoutcheckout(){
        Session::flush();
        return redirect()->route('index');
    }
    public function savecheckoutcustomer(Request $request){
        $dataShipping = array();
        if (isset($request->shipping_name)){
            $dataShipping['shipping_name']= $request->shipping_name;
        }else{
            $dataShipping['shipping_name']= Session::get('customer_name') ;
        }
        if (isset($request->shipping_phone)){
            $dataShipping['shipping_phone']= $request->shipping_phone;
        }else{
            $dataShipping['shipping_phone']= Session::get('customer_phone') ;
        }
        if (isset($request->shipping_address)){
            $dataShipping['shipping_address']= $request->shipping_address;
        }else{
            $dataShipping['shipping_address']= Session::get('customer_address') ;
        }

        $dataShipping['shipping_city']= Session::get('customer_city');
        $dataShipping['shipping_district']= Session::get('customer_province');
        $dataShipping['shipping_wards']= Session::get('customer_wards');
        $dataShipping['shipping_email']= Session::get('customer_email');
        if($request->shipping_city != '0' && $request->shipping_district != '0' && $request->shipping_wards != '0' ){
        $dataShipping['shipping_city']= $request->shipping_city;
        $dataShipping['shipping_district']= $request->shipping_district;
        $dataShipping['shipping_wards']= $request->shipping_wards;
        }
        $dataShippingItem= $this->shipping->create($dataShipping);
        $phi_ship= $this->phi_ship->where('phi_ship_matp',$request->shipping_city)->where('phi_ship_maqh',$request->shipping_district)
            ->where('phi_ship_maxa',$request->shipping_wards)->first();
        if (isset($phi_ship->phi_ship)){
            Session::put('$phi_ship',$phi_ship->phi_ship);
        }else{
            Session::put('$phi_ship',10000);
        }
        Session::put('shipping_id',$dataShippingItem->id);
        return redirect()->route('payment.payment');
    }
    public function oder(Request $request){
        if (empty(session()->get('cart'))){
            return redirect()->route('index');
        }else{


        try {
            DB::beginTransaction();
            $datapayment= array();
            $datapayment['payment_method'] = $request->payment_method;
            $datapayment['payment_status'] = 0;
            $payment_id = $this->payment->create($datapayment);
            $total=0;
            $totalProduct=0;
            $x=0;

            $carts=session()->get('cart');
            foreach ($carts as $id => $cartItem){
                $total= $total + $cartItem['product_price']*$cartItem['quantity'];
                $totalProduct= $totalProduct + $cartItem['product_price']*$cartItem['quantity'];
                $x=$x+1;

            }
            $phiship=0;

            $phishipsession=Session::get('$phi_ship')*$x;
            if ($phishipsession > 0){
                $phiship=$phishipsession;
            }
            $coupon=0;
            if (Session::get('coupon')){
                foreach (Session::get('coupon') as $key => $cou){
                    if ($cou['coupon_function'] == 1){
                        $coupon=$total*$cou['coupon_number']/100;
                    }else{
                        $coupon=$cou['coupon_number'];
                    }
                }
            }
            if($total - $coupon <= 0){
                $total = 0;

            }else{
                $total=$total + $phiship - $coupon;
            }


            //orders
            $dataOrder= array();
            $coupon_code= 0 ;
            if (Session::get('coupon')){
                foreach (Session::get('coupon') as $id => $cou){
                    if ($cou['coupon_code']){
                        $coupon_code=$cou['coupon_code'];
                    }else{
                        $coupon_code=0;
                    }
                }
            }


            $dataOrder['order_coupon'] = $coupon;
            $dataOrder['coupon_code'] = $coupon_code;
            $dataOrder['order_phi_ship'] = $phiship;
            $dataOrder['order_total_product'] = $totalProduct;
            $dataOrder['order_total'] = $total;
            $dataOrder['order_status'] = 0;
            $dataOrder['customer_id'] = Session()->get('customer_id');
            $dataOrder['shipping_id'] = Session()->get('shipping_id');
            $dataOrder['payment_id'] = $payment_id->id;
            $order_id = $this->order->create($dataOrder);
            //order_detail
            foreach ($carts as $id => $cartItem){
                $dataOrderd= array();
                $dataOrderd['order_id'] = $order_id->id;
                $dataOrderd['product_id'] =$cartItem['product_id'];
                $dataOrderd['product_name'] = $cartItem['product_name'];
                $dataOrderd['product_price'] = $cartItem['product_price'];
                $dataOrderd['product_sales_quantity'] = $cartItem['quantity'];
                $this->order_detail->create($dataOrderd);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());

        }
        if($datapayment['payment_method'] == 1 ){
            echo 'Thanh toán bẳng thẻ ATM';
        }else{
            session()->forget('cart');
            session()->forget('coupon');
            return view('pages.checkout.tienmat');
        }

    }
    }
    public function oder_paypal(Request $request){
        try {
            DB::beginTransaction();
            $datapayment= array();
            $datapayment['payment_method'] = 1;
            $datapayment['payment_status'] = 1;
            $payment_id = $this->payment->create($datapayment);
            $total=0;
            $totalProduct=0;
            $x=0;

            $carts=session()->get('cart');
            foreach ($carts as $id => $cartItem){
                $total= $total + $cartItem['product_price']*$cartItem['quantity'];
                $totalProduct= $totalProduct + $cartItem['product_price']*$cartItem['quantity'];
                $x=$x+1;

            }
            $phiship=0;

            $phishipsession=Session::get('$phi_ship')*$x;
            if ($phishipsession > 0){
                $phiship=$phishipsession;
            }
            $coupon=0;
            if (Session::get('coupon')){
                foreach (Session::get('coupon') as $key => $cou){
                    if ($cou['coupon_function'] == 1){
                        $coupon=$total*$cou['coupon_number']/100;
                    }else{
                        $coupon=$cou['coupon_number'];
                    }
                }
            }
            if($total - $coupon <= 0){
                $total = 0;

            }else{
                $total=$total + $phiship - $coupon;
            }


            //orders
            $dataOrder= array();
            $coupon_code= 0 ;
            if (Session::get('coupon')){
                foreach (Session::get('coupon') as $id => $cou){
                    if ($cou['coupon_code']){
                        $coupon_code=$cou['coupon_code'];
                    }else{
                        $coupon_code=0;
                    }
                }
            }


            $dataOrder['order_coupon'] = $coupon;
            $dataOrder['coupon_code'] = $coupon_code;
            $dataOrder['order_phi_ship'] = $phiship;
            $dataOrder['order_total_product'] = $totalProduct;
            $dataOrder['order_total'] = $total;
            $dataOrder['order_status'] = 0;
            $dataOrder['customer_id'] = Session()->get('customer_id');
            $dataOrder['shipping_id'] = Session()->get('shipping_id');
            $dataOrder['payment_id'] = $payment_id->id;
            $order_id = $this->order->create($dataOrder);
            //order_detail
            foreach ($carts as $id => $cartItem){
                $dataOrderd= array();
                $dataOrderd['order_id'] = $order_id->id;
                $dataOrderd['product_id'] =$cartItem['product_id'];
                $dataOrderd['product_name'] = $cartItem['product_name'];
                $dataOrderd['product_price'] = $cartItem['product_price'];
                $dataOrderd['product_sales_quantity'] = $cartItem['quantity'];
                $this->order_detail->create($dataOrderd);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());

        }
        if($datapayment['payment_method'] == 1 ){
            session()->forget('cart');
            session()->forget('coupon');
//            return view('pages.checkout.tienmat');
        }else{
            session()->forget('cart');
            session()->forget('coupon');
//            return view('pages.checkout.tienmat');
        }

    }
}
