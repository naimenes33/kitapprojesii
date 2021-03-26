<?php

 use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\kategori\indexController as KategoriIndexController;
use App\Http\Controllers\admin\kitap\indexController as KitapIndexController;
use App\Http\Controllers\admin\kullanici\index1Controller;
use App\Http\Controllers\admin\order\indexController as OrderIndexController;
use App\Http\Controllers\admin\slider\indexController as SliderIndexController;
use App\Http\Controllers\admin\yayinevi\indexController as YayineviIndexController;
use App\Http\Controllers\admin\yazar\indexController as YazarIndexController;
use App\Http\Controllers\front\basket\indexController as BasketIndexController;
use App\Http\Controllers\front\cat\indexController as CatIndexController;
use App\Http\Controllers\front\index2Controller;
use App\Http\Controllers\front\indexController as FrontIndexController;
use App\Http\Controllers\front\kitap\indexController as FrontKitapIndexController;
use App\Http\Controllers\front\search\indexController as SearchIndexController;
use App\Http\Controllers\kitapController;
 use App\Models\Kitap;
 use Illuminate\Database\Console\DbCommand;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\HomeController;
 

// Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.'],function(){  
// Route::get('/',[indexController::class,'index'])->name('index');

// Route::group(['namespace'=>'kullanici'],function() {

//     Route::get('kullanici/ekle',[index1Controller::class,'ekle'])->name('kullanici.ekle');
// });
// });

// Route::get('/kitaplar',function(){

//     $x = \App\Models\User::find(1);
//     echo $x->full_name;
  

// });



// Route::group(['namespace'=>'front','prefix'=>'/'],function (){

//     Route::get('/',[index2Controller::class,'index'])->name('index');
// });


// Route::get('/users',function(){

//     $users = \Illuminate\Support\Facades\DB::table('users')->where('id', '=' , '1')->get();
    
//     dd($users);
// });

 //  Route::get('/kitap/ekle',[kitapController::class,'create']);
 //  Route::post('/kita/ekle',[kitapController::class,'store'])->name('kitap.ekle.post');

 //  Route::get('/',function(){

 //     $array = collect([
 //          ['foo'=>10],
 //          ['foo'=>20],
 //          ['foo'=>30]


 //     ])->avg('foo');

 //     echo($array);
 //  });


// Route::get('/',function ()
// {
//      return('hello world');
    
// });

Route::get('/',[FrontIndexController::class,'index'])->name('index'); 
Route::get('/kitap/detay/{selflink}',[FrontKitapIndexController::class,'index'])->name('kitap.detay');
Route::get('/kategori/{selflink}',[CatIndexController::class,'index'])->name('cat');
Route::get('/basket/add/{id}',[BasketIndexController::class,'add'])->name('basket.add');
Route::get('/basket',[BasketIndexController::class,'index'])->name('basket.index');
Route::get('/basket/remove/{id}',[BasketIndexController::class,'remove'])->name('basket.remove');
Route::get('/basket/complete',[BasketIndexController::class,'complete'])->name('basket.complete')->middleware(['auth']);
Route::post('/basket/complete',[BasketIndexController::class,'completeStore'])->name('basket.completeStore')->middleware(['auth']);
Route::get('/basket/flush',[BasketIndexController::class,'flush'])->name('basket.flush');
Route::get('/search',[SearchIndexController::class,'index'])->name('search');
 Auth::routes();
 Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth','AdminCtrl']],function(){
    Route::get('/',[indexController::class,'index'])->name('index');

    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.'],function (){
         Route::get('/',[YayineviIndexController::class,'index'])->name('index');
         Route::get('/ekle',[YayineviIndexController::class,'create'])->name('create');
         Route::post('/ekle',[YayineviIndexController::class,'store'])->name('create.post');
         Route::get('/düzenle/{id}',[YayineviIndexController::class,'edit'])->name('edit');
         Route::post('/düzenle/{id}',[YayineviIndexController::class,'update'])->name('edit.post');
         Route::get('/sil/{id}',[YayineviIndexController::class,'delete'])->name('delete');
   
    });
    Route::group(['namespace'=>'yazar','prefix'=>'yazar','as'=>'yazar.'],function (){
        Route::get('/',[YazarIndexController::class,'index'])->name('index');
        Route::get('/ekle',[YazarIndexController::class,'create'])->name('create');
        Route::post('/ekle',[YazarIndexController::class,'store'])->name('create.post');
        Route::get('/düzenle/{id}',[YazarIndexController::class,'edit'])->name('edit');
        Route::post('/düzenle/{id}',[YazarIndexController::class,'update'])->name('edit.post');
        Route::get('/sil/{id}',[YazarIndexController::class,'delete'])->name('delete');
  
   });

   Route::group(['namespace'=>'kitap','prefix'=>'kitap','as'=>'kitap.'],function (){
    Route::get('/',[KitapIndexController::class,'index'])->name('index');
    Route::get('/ekle',[KitapIndexController::class,'create'])->name('create');
    Route::post('/ekle',[KitapIndexController::class,'store'])->name('create.post');
    Route::get('/düzenle/{id}',[KitapIndexController::class,'edit'])->name('edit');
    Route::post('/düzenle/{id}',[KitapIndexController::class,'update'])->name('edit.post');
    Route::get('/sil/{id}',[KitapIndexController::class,'delete'])->name('delete');

});

Route::group(['namespace'=>'order','prefix'=>'order','as'=>'order.'],function (){
    Route::get('/',[OrderIndexController::class,'index'])->name('index');
    Route::get('/ekle',[OrderIndexController::class,'create'])->name('create');
    Route::post('/ekle',[OrderIndexController::class,'store'])->name('create.post');
    Route::get('/detail/{id}',[OrderIndexController::class,'detail'])->name('detail');
    Route::get('/sil/{id}',[OrderIndexController::class,'delete'])->name('delete');

});

Route::group(['namespace'=>'kategori','prefix'=>'kategori','as'=>'kategori.'],function (){
    Route::get('/',[KategoriIndexController::class,'index'])->name('index');
    Route::get('/ekle',[KategoriIndexController::class,'create'])->name('create');
    Route::post('/ekle',[KategoriIndexController::class,'store'])->name('create.post');
    Route::get('/düzenle/{id}',[KategoriIndexController::class,'edit'])->name('edit');
    Route::post('/düzenle/{id}',[KategoriIndexController::class,'update'])->name('edit.post');
    Route::get('/sil/{id}',[KategoriIndexController::class,'delete'])->name('delete');

});

Route::group(['namespace'=>'slider','prefix'=>'slider','as'=>'slider.'],function (){
    Route::get('/',[SliderIndexController::class,'index'])->name('index');
    Route::get('/ekle',[SliderIndexController::class,'create'])->name('create');
    Route::post('/ekle',[SliderIndexController::class,'store'])->name('create.post');
    Route::get('/düzenle/{id}',[SliderIndexController::class,'edit'])->name('edit');
    Route::post('/düzenle/{id}',[SliderIndexController::class,'update'])->name('edit.post');
    Route::get('/sil/{id}',[SliderIndexController::class,'delete'])->name('delete');

});



});