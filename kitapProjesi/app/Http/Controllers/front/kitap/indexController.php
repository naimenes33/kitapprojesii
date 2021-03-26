<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use App\Models\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink){
        $c = Kitaplar::where('selflink','=',$selflink)->count();

        if($c!=0)
        {
            $d = Kitaplar::where('selflink','=',$selflink)->get();
            return view('front.kitap.index',['data'=>$d]);
        }
        else
        {
             return redirect('/');
        }
    }
}
