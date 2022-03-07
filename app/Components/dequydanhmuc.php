<?php
namespace  App\Components;

class dequydanhmuc{
    private  $data;
    private  $chon = '';
    public  function  __construct($data)
    {
        $this->data = $data;
    }

    function  categorydequy ($parentid, $id = 0, $text= ''){
        foreach ( $this->data as $value){
            if($value['category_parent_id'] == $id){
                if(!empty($parentid) && $parentid == $value['category_id'] ){
                    $this->chon  .= "<option selected value='" . $value['category_id'] . "'>" . $text . $value['category_name'] . "</option>";
                }else {
                    $this->chon  .= "<option value='" . $value['category_id'] . "'>" . $text . $value['category_name'] . "</option>";

                }
                $this->categorydequy ($parentid,$value['category_id'], $text. '---');
            }

        }

        return $this->chon;

    }


}
