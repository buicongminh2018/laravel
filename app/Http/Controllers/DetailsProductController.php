<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsProductController extends Controller
{
    private $comment;
    public function __construct(comment $comment)
    {
        $this->comment=$comment;
    }

    public function index($id){
        $cartSession =session()->get('cart');
        $detailsproduct = DB::table('products')->join('categories','categories.category_id','=','products.category_id')->where('products.product_id',$id)->get();
        foreach ($detailsproduct as $detailsproductItem){
            $category_id =$detailsproductItem->category_id;
        }
        $suggestProduct =DB::table('products')->join('categories','categories.category_id','=','products.category_id')->where('products.category_id',$category_id)->whereNotIn('products.product_id',[$id])->paginate(3);
        $detailsproductimage= DB::table('product_images')->where('product_id',$id)->paginate(3);

        return view('pages.detailsproduct.index',compact('detailsproduct','detailsproductimage','suggestProduct','cartSession'));
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment=$this->comment->where('comment_product_id',$product_id)->get();
        $output="";
        foreach ($comment as $key => $comm){
            $output .='   <div class="row" style="border: solid 1px #ccc;border-radius: 8px;background-color: aliceblue;color: blue;margin: 0">
                                                    <div class="col-md-2"><img src="/frontend/assets/img/1.png" ></div>
                                                    <div class="col-md-10">
                                                        <p style="color: orange">@'. $comm->comment_name .'</p>
                                                        <p style="color: #6b2fcd">'.$comm->created_at.'</p>
                                                        <p style="word-wrap: break-word">'.$comm->comment_value.'</p></div>
                                                </div> <p></p>';
            if (isset($comm->comment_prely)){
            $output .= '<div class="row" style="border: solid 1px #ccc;border-radius: 8px;background-color: aliceblue;color: blue;margin: 0">
                                                    <div class="col-md-2"><img src="/frontend/assets/img/2.JPG" ></div>
                                                    <div class="col-md-10">
                                                        <p style="color: orange">@Admin</p>
                                                        <p style="color: #6b2fcd">'.$comm->updated_at.'</p>
                                                        <p style="word-wrap: break-word">'.$comm->comment_prely.'</p></div>
                                                </div> <p></p>
                                                ';
            }




        }
        echo $output;


    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_value = $request->comment_value;
        $this->comment->create([
            'comment_name'=>$comment_name,
            'comment_value'=>$comment_value,
            'comment_product_id'=>$product_id,
            'comment_status'=>0
        ]);

    }
    public function comment(){
        $comment= $this->comment->with('product')->orderBy('comment_status','ASC')->paginate(20);
        return view('pagesadmin.admin.comment.index',compact('comment'));
    }
    public function duyet_comment(Request $request){
        $data= $request->all();
        $this->comment->where('comment_id',$data['comment_id'])->update([
            'comment_status'=>$data['comment_status']
            ]);

    }
    public function reply_comment(Request $request){
        $data= $request->all();
        $this->comment->where('comment_id',$data['comment_id'])->update([
            'comment_status'=> 1,
            'comment_prely'=>$data['comment_value']
        ]);
    }
}
