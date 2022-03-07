<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;

    }
    public  function index(){
        $Sliders = $this->slider->latest()->paginate(5);
        return view('pagesadmin.admin.slider.index',compact('Sliders'));
    }

    public  function create(){
        return view('pagesadmin.admin.slider.add');
    }
    public function store(Request $request){

            $dataInsertSlider= [
                'name'=>$request->name,
                'description'=>$request->description
            ];
            $dataImageslider = $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageslider)){
                $dataInsertSlider['image_name']=$dataImageslider['file_name'];
                $dataInsertSlider['image_path']=$dataImageslider['file_path'];
            }
            $this->slider->create($dataInsertSlider);
            return redirect()->route('slider.index');



    }
    public function edit($id){
        $slider = $this->slider->find($id);
        return view('pagesadmin.admin.slider.edit',compact('slider'));
    }
    public function update(Request $request, $id){
        try {
            $dataUpdateSlider= [
                'name'=>$request->name,
                'description'=>$request->description
            ];
            $dataImageslider = $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageslider)){
                $dataUpdateSlider['image_name']=$dataImageslider['file_name'];
                $dataUpdateSlider['image_path']=$dataImageslider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdateSlider);
            return redirect()->route('slider.index');

        }catch (\Exception $exception){
            Log::error('lỗi : '. $exception->getMessage() . ' line:' . $exception->getLine());

        }
    }
    public function delete ($id){
        try {
            $this->slider->find($id)->delete();
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

        }}
}
