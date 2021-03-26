<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink){
     
        $c = Kategoriler::where('selflink','=',$selflink)->count();
        if($c!=0)
        {
            $w = Kategoriler::where('selflink','=',$selflink)->get();
            $data = Kitaplar::where('kategoriid','=',$w[0]['id'])->paginate(10);
            return view('front.cat.index',['info'=>$w,'data'=>$data]);


        }

        else
        {
            return redirect('/');
        }

    }
}
