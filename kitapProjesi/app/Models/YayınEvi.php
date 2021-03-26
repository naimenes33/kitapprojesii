<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YayınEvi extends Model
{
    protected $guarded = [];

    static function getField($id,$field){
        $c = YayınEvi::where('id','=',$id)->count();
        if($c!=0){
              $d = YayınEvi::where('id','=',$id)->get();
              return $d[0][$field];
        }
        else
        {
             return "Silinmiş yayınevi";
        }
    }
}
