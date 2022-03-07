<?php

namespace App\Http\Controllers;

use App\city;
use App\order;
use App\order_detail;
use App\payment;
use App\Product;
use App\province;
use App\shipping;
use App\Traits\DeleteModel;
use App\wards;
use Illuminate\Http\Request;
use PDF;

class adminOderController extends Controller
{
    use DeleteModel;
    private $order;
    private $order_detail;
    private $city;
    private $province;
    private $wards;
    private $shipping;
    private $product;
    private $payment;

    public function printoder($checkcode){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_oder_convert($checkcode));
        return $pdf->stream();
    }
    public function print_oder_convert($checkcode){
        $order= $this->order->join('customers','customers.customer_id','=','orders.customer_id')
            ->join('shippings','orders.shipping_id','=','shippings.shipping_id')->where('order_id',$checkcode)
            ->select('orders.*','customers.*','shippings.*')->first();
        $payment=$this->payment->where('payment_id',$order->payment_id)->first();
        $shipping= $this->shipping->where('shipping_id',$order->shipping_id)->join('tinhthanhpho','tinhthanhpho.matp','=','shippings.shipping_city')
            ->join('quanhuyen','quanhuyen.maqh','=','shippings.shipping_district')->join('xaphuongthitran','xaphuongthitran.xaid','=','shippings.shipping_wards')->first();
        $orderd = $this->order_detail->where('order_id',$checkcode)->paginate(50);
        $output = '';
        $output = '<style>
*{
text-align: center;
}
body{
font-family: DejaVu Sans;
}
</style>
<h2 style="text-align: center">Shop thiết bị điện tử M&M</h2>
<h3 style="text-align: center">Thông tin khách hàng</h3>

<table style="width: 100%"  class="table">
  <thead>
    <tr>
      <th scope="col" >Tên người đặt</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>';
            $output.='
    <tr>
      <td>'.$order->customer_name.'</td>
      <td>'.$order->customer_phone.'</td>
      <td>'.$order->customer_email.'</td>
    </tr>';

        $output.='
  </tbody>
</table>';

        $output = '<style>
*{
text-align: center;
}
body{
font-family: DejaVu Sans;
}
</style>
<h2 style="text-align: center">Shop thiết bị điện tử M&M</h2>
<h3 style="text-align: center">Thông tin khách hàng</h3>

<table style="width: 100%"  class="table">
  <thead>
    <tr>
      <th scope="col" >Tên người đặt</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>';
        $output.='
    <tr>
      <td>'.$order->customer_name.'</td>
      <td>'.$order->customer_phone.'</td>
      <td>'.$order->customer_email.'</td>
    </tr>
  </tbody>
</table>';
        $output .= '

<h3 style="text-align: center">Thông tin Vận chuyển</h3>

<table style="width: 100%"  class="table">
  <thead>
    <tr>
      <th scope="col" >Tên người vận chuyển</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Số điện thoại</th>
    </tr>
  </thead>
  <tbody>';
        $output.='
    <tr>
      <td>'.$order->shipping_name.'</td>
      <td>TP:'.$shipping->name_tp.',Quận/Huyện:'.$shipping->name_qh.',Xã/Phường:'.$shipping->name_xa.','.$order->shipping_address.'</td>
      <td>'.$order->shipping_phone.'</td>
    </tr>
  </tbody>
</table>';
            $output .= '

<h3 style="text-align: center">Liệt kê đơn hàng</h3>

<table style="width: 100%"  class="table">
  <thead>
    <tr>
      <th scope="col" >Tên sản phẩm	</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá</th>
      <th scope="col">Thành tiền</th>
    </tr>
  </thead>
  <tbody>';
        foreach($orderd as $orderdItem ){
            $output.= '
    <tr>
      <td>'.$orderdItem->product_name.'</td>
      <td>'.$orderdItem->product_sales_quantity.'</td>
      <td>'.number_format($orderdItem->product_price).'<sup>đ</sup></td>
      <td>'.number_format($orderdItem->product_price*$orderdItem->product_sales_quantity).'<sup>đ</sup></td>
    </tr>';
        }

  $output .= '</tbody>
</table>';
        if ($order->order_total > 0){
            $output .= '<div>
<h3>Tổng tiền: </h3>
<h4>Tiền sản phẩm: '.number_format($order->order_total_product).'<sup>đ</sup></h4>
<h4>Giảm giá: '.number_format($order->order_coupon).'<sup>đ</sup></h4>
<h4>phí shíp: '.number_format($order->order_phi_ship).'<sup>đ</sup></h4>
<h3>Thành tiền: '.number_format($order->order_total).'<sup>đ</sup></h3>
</div>

';
        }else{
            $output .= '<div>
<h3>Tổng tiền: </h3>
<h4>Tiền sản phẩm: 0<sup>đ</sup></h4>
<h4>Giảm giá: 0<sup>đ</sup></h4>
<h4>phí shíp: 0<sup>đ</sup></h4>
<h3>Thành tiền: 0<sup>đ</sup></h3>
</div>

';
        }
        if ($payment->payment_status != 0){
            $output .='<h3 style="float: left">Đơn hàng đã thanh toán </h3>';
        }





        return $output;



    }
    public function __construct(Product $product,order $order,order_detail $order_detail,city $city,province $province,wards $wards,shipping $shipping,payment $payment)
    {
        $this->order=$order;
        $this->product=$product;
        $this->order_detail=$order_detail;
        $this->city=$city;
        $this->province=$province;
        $this->wards=$wards;
        $this->shipping=$shipping;
        $this->payment=$payment;

    }

    public function index(){
        $order= $this->order->join('payments','payments.payment_id','=','orders.payment_id')->join('customers','customers.customer_id','=','orders.customer_id')
            ->select('orders.*','customers.customer_name','customers.customer_id','payments.payment_status')->get();
        return view('pagesadmin.admin.oder.manageoder',compact('order'));
    }
    public function view($id){
        $order= $this->order->join('customers','customers.customer_id','=','orders.customer_id')
            ->join('shippings','orders.shipping_id','=','shippings.shipping_id')->where('order_id',$id)
            ->select('orders.*','customers.*','shippings.*')->first();
        $shipping= $this->shipping->where('shipping_id',$order->shipping_id)->join('tinhthanhpho','tinhthanhpho.matp','=','shippings.shipping_city')
            ->join('quanhuyen','quanhuyen.maqh','=','shippings.shipping_district')->join('xaphuongthitran','xaphuongthitran.xaid','=','shippings.shipping_wards')->first();
        $orderd = $this->order_detail->join('products','products.product_id','=','order_details.product_id')->where('order_id',$id)->paginate(5);
        $payment=$this->payment->where('payment_id',$order->payment_id)->first();
        return view('pagesadmin.admin.oder.detailoder',compact('order','orderd','shipping','payment'));
    }
    public function update_quantity_oder(Request $request){
        $data= $request->all();
        $orderItem = $this->order->where('order_id',$data['order_id'])->first();
        $order = $this->order->where('order_id',$data['order_id'])->update([
            'order_status'=>$data['order_status']
        ]);
        if ($data['order_status'] != 1 || $data['order_status'] != 2){
            if ($orderItem->order_status == 1 || $orderItem->order_status == 2){
                foreach ($data['oder_product_id'] as $key1 => $product_id){
                    $product=$this->product->where('product_id',$product_id)->first();
                    $product_quantity=$product->product_quantity;
                    $product_id=$product->product_id;
                    foreach ($data['order_quantity'] as $key2 => $quantity){
                        if ($key1 == $key2){
                            $pro_remain = $product_quantity + $quantity;
                            $this->product->where('product_id',$product_id)->update([
                                'product_quantity'=>$pro_remain,
                            ]);

                        }

                    }
                }


            }
        }

if ($orderItem->order_status == 0 || $orderItem->order_status=3){
    if ($data['order_status'] == 1 || $data['order_status'] == 2){
        foreach ($data['oder_product_id'] as $key1 => $product_id){
            $product=$this->product->where('product_id',$product_id)->first();
            $product_quantity=$product->product_quantity;
            $product_id=$product->product_id;
            foreach ($data['order_quantity'] as $key2 => $quantity){
                if ($key1 == $key2){
                    $pro_remain = $product_quantity - $quantity;
                    $this->product->where('product_id',$product_id)->update([
                        'product_quantity'=>$pro_remain,
                    ]);

                }

            }
        }
    }

}





    }
    public function detail_oder(){

        $customer_id= session()->get('customer_id');
        $order = $this->order->where('customer_id',$customer_id)->join('payments','payments.payment_id','=','orders.payment_id')->join('shippings','orders.shipping_id','=','shippings.shipping_id')->select('orders.*','payments.payment_status','shippings.*')->orderBy('order_id','DESC')->paginate(10);
        return view('pages.oder.index',compact('order'));
    }
    public function detail_oder_view($id){
        $customer_id= session()->get('customer_id');
        $orderd= $this->order_detail->where('order_id',$id)->join('products','products.product_id','=','order_details.product_id')->select('order_details.*','products.product_feature_image_path')->get();
        $orders= $this->order->where('order_id',$id)->join('payments','payments.payment_id','=','orders.payment_id')->select('orders.*','payments.payment_status')->first();
        $payment=$this->payment->where('payment_id',$orders->payment_id)->first();
        $order = $this->order->where('customer_id',$customer_id)->join('payments','payments.payment_id','=','orders.payment_id')->join('shippings','orders.shipping_id','=','shippings.shipping_id')->select('orders.*','payments.payment_status','shippings.*')->orderBy('order_id','DESC')->paginate(10);
        return view('pages.oder.index',compact('order','orderd','orders','payment'));
    }
    public function detail_oder_delete($id){
        $this->order->where('order_id',$id)->delete();
        $customer_id= session()->get('customer_id');
        $order = $this->order->where('customer_id',$customer_id)->join('payments','payments.payment_id','=','orders.payment_id')->join('shippings','orders.shipping_id','=','shippings.shipping_id')->select('orders.*','payments.payment_status','shippings.*')->orderBy('order_id','DESC')->paginate(10);
        return view('pages.oder.index',compact('order'));
    }

}
