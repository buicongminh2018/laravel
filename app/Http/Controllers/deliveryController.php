<?php

namespace App\Http\Controllers;

use App\city;
use App\phi_ship;
use App\province;
use App\wards;
use Illuminate\Http\Request;

class deliveryController extends Controller
{
    private $city;
    private $province;
    private $wards;
    private $phi_ship;

    public function __construct(city $city,province $province,wards $wards,phi_ship $phi_ship)
    {
        $this->city=$city;
        $this->province=$province;
        $this->wards=$wards;
        $this->phi_ship=$phi_ship;
    }

    public function index(Request $request){
        $city= $this->city->orderby('matp','ASC')->get();
        return view('pagesadmin.admin.delyvery.index',compact('city'));

    }
    public function selectdelivery(Request $request){
        $data= $request->all();

        if ($data['action']){
            $output='';
            if ($data['action']=='city'){
                $select_province= $this->province->where('matp',$data['matp'])->orderby('maqh','ASC')->get();
                $output.='<option value="0"> Chọn quận huyện </option>';
                foreach ($select_province as $value){
                    $output .='<option value=" '.$value->maqh.' ">'.$value->name_qh .'</option>>';
                }
            }else{
                $select_wards= $this->wards->where('maqh',$data['matp'])->orderby('xaid','ASC')->get();
                $output.='<option value="0"> Chọn xã phường </option>';
                foreach ($select_wards as $select_ward){
                    $output .='<option value=" '.$select_ward->xaid.' ">'.$select_ward->name_xa .'</option>>';
                }


            }
            echo $output;

        }

    }
    public function insert_delivery(Request $request){
        $data= $request->all();
        $phi_ship= $this->phi_ship->where('phi_ship_matp',$data['city'])->where('phi_ship_maqh',$data['province'])->where('phi_ship_maxa',$data['wards'])->first();
        if(isset($phi_ship)){
            $this->phi_ship->where('phi_ship_id',$phi_ship->phi_ship_id)->update([
                'phi_ship'=>$data['phi_ship']
            ]);
        }else{
            $this->phi_ship->create([
                'phi_ship_matp'=>$data['city'],
                'phi_ship_maqh'=>$data['province'],
                'phi_ship_maxa'=>$data['wards'],
                'phi_ship'=>$data['phi_ship']
            ]);
        }

    }
    public function list_delivery(){
        $phi_ships=$this->phi_ship->orderby('phi_ship_id','DESC')->get();
        $output='';
        $output .='
                    <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Tên thành phố</th>
                              <th scope="col">Tên quận huyện</th>
                              <th scope="col">Tên xã phường</th>
                              <th scope="col">phí shíp</th>
                            </tr>
                          </thead>
                       <tbody>
                             ';
        foreach ($phi_ships as $value){
            $output .='
                                <tr>
                                    <td>' .$value->city->name_tp. '</td>
                                    <td>' .$value->province->name_qh. '</td>
                                    <td>' .$value->wards->name_xa. '</td>
                                    <td class="phi_ship_edit" contenteditable data-phiship_id="'.$value->phi_ship_id.'">'.$value->phi_ship.'</td>
                                </tr>
            ';

        }

        $output .='
                             </tbody>

                        </table>

            ';
        echo  $output;

    }
    public function update_delivery(Request $request){
        $data= $request->all();
        $this->phi_ship->where('phi_ship_id',$data['phi_ship_id'])->update([
            'phi_ship'=>$data['phi_value']
        ]);
    }
}
