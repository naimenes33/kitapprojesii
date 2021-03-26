<?php

namespace App\Http\Controllers\front\search;

use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        if(strip_tags($_GET['q'])!="")
        {
            $q = strip_tags($_GET['q']);
            $c = Kitaplar::where('name','like','%'.$q.'%')->paginate(10);
            return view('front.search.index',['data'=>$c]);

        }

        else
        {
            return redirect('/');
        }

    }
}
