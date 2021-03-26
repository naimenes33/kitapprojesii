<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\YayınEvi;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

      $data = YayınEvi::paginate(10);
      return view('admin.yayinevi.index',['data'=>$data]);
    }

    public function create(Request $request){

        return view('admin.yayinevi.create');
    }

    public function store(Request $request){

        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert=YayınEvi::create($all);
        if($insert){

            return redirect()->back()->with('status','Yayınevi başarıyla eklendi');
        }
        else{

            return redirect()->back()->with('status','Yayın evi eklenemedi');
        }

        
    }

    public function edit($id){

        $c = YayınEvi::where('id','=',$id)->count(); 

        if($c!=0){

            $data =YayınEvi::where('id','=',$id)->get();
            return view('admin.yayinevi.edit',['data'=>$data]);

        }
        else{
            return redirect('/');
        }
        
    }

    public function update(Request $request){

        $id = $request->route('id');
        $c = YayınEvi::where('id','=',$id)->count();

            if($c!=0){
                $all = $request->except('_token');
                $all['selflink'] = mHelper::permalink($all['name']);
                
                $update = YayınEvi::where('id','=',$id)->update($all);
                
                if($update)
                {
                    return redirect()->back()->with('status','Güncelleme işlemi başarılı');
                }
                else
                {
                    return redirect()->back()->with('status','güncelleme işlemi başarısız');
                }
            }
        
            else{
              return redirect('/');

            }
    }

    public function delete($id){

        $c = YayınEvi::where('id','=',$id)->count();

        if($c!=0){
        $delete = YayınEvi::where('id','=',$id)->delete();
        return redirect()->back();
        }
        else{
            return redirect('/');

          }
    }
}
