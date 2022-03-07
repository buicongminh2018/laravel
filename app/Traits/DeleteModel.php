<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait DeleteModel{
    public function deleteModeltrait($id,$model,$whereid){
        try {
            $model->where($whereid,$id)->delete();
            return response()->json([
                'code' =>200,
                'message'=> 'Delete succes'
            ],200);
        } catch (\Exception $exception){
            Log::error('lỗi : '. $exception->getMessage() . ' line:' . $exception->getLine());

            return response()->json([
                'code' =>500,
                'message'=> 'Delete fail'
            ],500);

        }

    }
}
