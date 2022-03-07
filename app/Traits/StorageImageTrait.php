<?php
namespace App\Traits;
use Storage;
trait  StorageImageTrait{
    public function storageTraitUpload($request,$filename, $foderName){
        if ($request->hasFile($filename)){
            $file=$request->$filename;
            $fileName =  $file->getClientOriginalName();
            $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();
            $filepath = $request->file($filename)->storeAs('public/' .$foderName. '/' ,$fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($filepath),

            ];
            return $dataUploadTrait;
        }
        return null;


    }

    public function storageTraitUploadMulti($file, $foderName){

        $fileName =  $file->getClientOriginalName();
        $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();
        $filepath = $file->storeAs('public/' .$foderName. '/' ,$fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileName,
            'file_path' => Storage::url($filepath),

        ];
        return $dataUploadTrait;
    }

}
