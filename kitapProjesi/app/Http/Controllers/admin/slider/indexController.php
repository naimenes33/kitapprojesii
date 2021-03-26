<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

        $data = Slider::paginate(10);
        return view('admin.slider.index',['data'=>$data]);
    }

    public function create(){
         return view('admin.slider.create');
    }

    public function store(Request $request){
        $data['image'] = imageUpload::singleUpload(rand(1,9000),'slider',$request->file('image'));
        $insert = Slider::create($data);
        if($data['image']!=""){
        if($insert)
        {
            return redirect()->back()->with('status','başarı ile ekendi');
        }
        else
        {
             return redirect()->back()->with('status','eklenemedi');
        }
    }
    else
    {
        return redirect()->back()->with('status','eklenemedi');
    }

    }
     
    public function edit($id){
        $data = Slider::where('id','=',$id)->get();
        return view('admin.slider.edit',['data'=>$data]);

    }

    public function update(Request $request){
        $id = $request->route('id');
        $data = Slider::where('id','=',$id)->get();
        $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),'slider',$request->file('image'),$data,'image');
        if($all['image']!=""){
            $update = Slider::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','başarı ile ekendi');
            }
            else
            {
                 return redirect()->back()->with('status','eklenemedi');
            }
        }
        else
        {
            return redirect()->back()->with('status','eklenemedi');
        } 
    }

           public function delete($id)
           {
               Slider::where('id','=',$id)->delete();
               return redirect()->back()->with('status','Silindi');
           }



}
