<?php

namespace App\Http\Controllers;

use App\customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;

class MailController extends Controller
{
    private $customer;
    public function __construct(customer $customer)
    {
        $this->customer=$customer;
    }
    public function send_gmail($coupon_name,$coupon_code,$coupon_function,$coupon_number){
        return view('pages.cart.send_gmail');

    }
    public function forget_password(){
        return view('pages.home.quenmatkhau');
    }
    public function send_forget_password(Request $request){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_gmail= "Shop bán hang M&M: Lấy lại mật khẩu " . ' '. $now;
        $customer= $this->customer->where('customer_email',$request->customer_email)->first();


        if (empty($customer)){
                Session::put('message','Email chưa được đăng ký không thể khôi phục mật khẩu');
                return redirect()->back();
        }else{
            $token= Str::random();
            $customers=$this->customer->where('customer_id',$customer->customer_id)->update([
               'customer_token'=> $token
            ]);
            //send mail
            $to_mail = $request->customer_email;
            $link_reset_pass = url('/update-new-pass?email='.$to_mail.'&token='.$token);
            $data= array("name"=>$title_gmail,"body"=>$link_reset_pass,'email'=>$request->customer_email);
            Mail::send('pages.mail.doimatkhau',['data'=>$data], function ($message) use ($title_gmail,$data){
                $message->to($data['email'])->subject($title_gmail);
                $message->from($data['email'],$title_gmail);
            });
            Session::put('messages','Đã gửi thành công vui lòng vào gmail để đổi password');
            return redirect()->back();

        }



    }
    public function update_new_pass(){
        return view('pages.mail.newpass');

    }
    public function update_new_password(Request $request){
        if ($request->customer_password != $request->customer_password2){
            Session::put('message','Mật khẩu và mật khẩu nhập lại không giống nhau');
            return redirect()->back();
        }else{
            $customer=$this->customer->where('customer_email',$request->email)->where('customer_token',$request->token)->first();
            $this->customer->where('customer_id',$customer->customer_id)->update([
                'customer_password'=>md5($request->customer_password),
                'customer_token'=> null
            ]);
            Session::put('messages','Đổi mật khẩu thành công');
            return redirect()->back();
        }

    }

    public function send_coupon($coupon_name,$coupon_code,$coupon_function,$coupon_number){
        $customer=$this->customer->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_gmail= "Shop bán hang M&M: Mã khuyến mãi ngày" . ' '. $now;
        $data = [];
        $coupon = array(
            'coupon_name'=>$coupon_name,
            'coupon_code'=>$coupon_code,
            'coupon_function'=>$coupon_function,
            'coupon_number'=>$coupon_number,
        );
        foreach ($customer as $value){
            $data['email'][]= $value->customer_email;
        }

        Mail::send('pages.cart.send_gmail',['coupon'=>$coupon], function ($message) use ($title_gmail,$data){
            $message->to($data['email'])->subject($title_gmail);
            $message->from($data['email'],$title_gmail);
        });
        return redirect()->back();



    }
}
