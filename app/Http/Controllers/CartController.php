<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart(){
//        echo '<pre>';
//        print_r(session()->get('cart'));
        $carts =session()->get('cart');

        return view('pages.cart.index',compact('carts'));

    }
    public function addToCart($id,Request $request){
//        session()->forget('cart');
//        dd('end');
        $product= DB::table('products')->where('product_id',$id)->first();
        $cart= session()->get('cart');
        $qty=1;
        if (isset($request->qty)){
            $qty=$request->qty;
        }

        if( isset($cart[$id]) ){
            $cart[$id]['quantity']= $cart[$id]['quantity'] + $qty;

        }else{
            $cart[$id] =[
                'product_id'=>$product->product_id,
                'product_feature_image_path'=>$product->product_feature_image_path,
                'product_name'=>$product->product_name,
                'product_price'=>$product->product_price,
                'product_quantity'=>$product->product_quantity,
                'quantity'=>$qty
            ];
        }
        if ((int)$cart[$id]['quantity'] > (int)$cart[$id]['product_quantity']){
            return response()->json(
                [
                    'code'=>300,
                    'message'=>'Số lượng sản phẩm phải nhỏ hơn hoặc bằng ' .(int)$cart[$id]['product_quantity']

                ],200);

        }else{
            session()->put('cart',$cart);
            $carts =session()->get('cart');
            $cartHeader = view('pages.components.header',compact('carts'))->render();

            return response()->json(
                [
                    'code'=>200,
                    'cartHeader'=>$cartHeader,
                    'message'=>'success'

                ],200);

        }








    }
    public function deleteHeaderCart(Request $request){

        if ($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts = session()->get('cart');
            $cartHeader = view('pages.components.header',compact('carts'))->render();
            return response()->json(['cartHeader' =>$cartHeader,'code'=>200],200);
        }

    }

    public function updateCart(Request $request){
        if ($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            if ($request->quantity > $carts[$request->id]['product_quantity']){
                return response()->json(
                    [
                        'code'=>300,
                        'message'=>'Số lượng sản phẩm phải nhỏ hơn hoặc bằng ' .(int)$carts[$request->id]['product_quantity']

                    ],200);
            }

            session()->put('cart',$carts);
            $carts = session()->get('cart');
            $cartHeader = view('pages.components.header',compact('carts'))->render();
            $cartComponent = view('pages.components.cart_component',compact('carts'))->render();
            return response()->json(['cartComponent' =>$cartComponent,'cartHeader'=>$cartHeader,'code'=>200],200);
        }

    }

    public function deleteCart(Request $request){

        if ($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts = session()->get('cart');
            $cartHeader = view('pages.components.header',compact('carts'))->render();
            $cartComponent = view('pages.components.cart_component',compact('carts'))->render();
            return response()->json(['cartComponent' =>$cartComponent,'cartHeader'=>$cartHeader,'code'=>200],200);
        }

    }
}
