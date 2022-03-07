<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\CouponRequest;
use App\order;
use App\Traits\DeleteModel;
use Illuminate\Http\Request;
use Session;
use DB;

class couponController extends Controller
{
    use DeleteModel;
    private $coupon;
    private $order;
    public function __construct(Coupon $coupon,order $order)
    {
        $this->coupon=$coupon;
        $this->order=$order;
    }

    public function index(){
        $coupons= $this->coupon->latest()->get();
        return view('pagesadmin.coupon.index',compact('coupons'));
    }
    public function create(){
        return view('pagesadmin.coupon.add');
    }
    public function store(CouponRequest $request){
        $tmp=$request->coupon_number;
        if ($request->coupon_function == 1){
            if ( $request->coupon_number > 30){
                $tmp=30;
            }
        }

        $this->coupon->create([
            'coupon_name'=> $request->coupon_name,
            'coupon_code'=> $request->coupon_code,
            'coupon_function'=> $request->coupon_function,
            'coupon_number'=> $tmp

        ]);
        return redirect()->route('coupon.index');
    }
    public function delete($id){
        return $this->deleteModeltrait($id,$this->coupon,'coupon_id');

    }
    public function checkcoupon(Request $request){
        if (Session()->get('customer_id')){
            $mskh=Session()->get('customer_id');
        }
        $checktontai=$this->order->where('customer_id',$mskh)->where('coupon_code',$request->coupon_code)->first();
        if (isset($checktontai)){
            $messageEror='Bạn đã nhập mã giảm giá này rồi';
            return redirect()->route('payment.payment',compact('messageEror'));
        }else{


        $coupon = $this->coupon->where('coupon_code',$request->coupon_code)->first();
        if(isset($coupon)){
            $count_coupon= $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if(isset($coupon_session)){
                    $tontai =0;
                    if ($tontai == 0){
                        $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_function'=>$coupon->coupon_function,
                            'coupon_number'=>$coupon->coupon_number);
                        Session::put('coupon',$cou);


                    }
                }else{
                    $cou[] = array(
                        'coupon_code'=>$coupon->coupon_code,
                        'coupon_function'=>$coupon->coupon_function,
                        'coupon_number'=>$coupon->coupon_number);
                    Session::put('coupon',$cou);
                }
                Session::save();
                $message='Thêm mã giảm giá thành công';
                return redirect()->route('payment.payment',compact('message'));
            }
        } else{
            $messageEror='Mã giảm giá không chính sác';
            return redirect()->route('payment.payment',compact('messageEror'));
        }
        }

    }
    public function unsetcoupon(){
        $coupon = Session::get('coupon');
        if (isset($coupon)){
            Session::forget('coupon');
            return redirect()->route('payment.payment');
        }

    }
}
