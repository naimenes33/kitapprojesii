@extends('layouts.admin')
@section('content')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        @if(session("status"))
                        <div class="alert alert-primary" role="alert">
                        {{session("status")}}
                        </div>
                        @endif

                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Kitap düzenle</h4>
                                    <p class="category">{{$data[0]['name']}}</p>
                                </div>
                                <div class="card-content">
                                    <form enctype="multipart/form-data" action="{{route('admin.kitap.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                                                </div>
                                            </div>  
                                      </div>      

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                @if($data[0]['image']!="")
                                                <img src="{{asset($data[0]['image'])}}" style="height: 120px;width:120px;" alt="">
                                                @endif
                                                    <input type="file" name="image" style="opacity: 1;position:inherit" class="form-control">
                                                </div>
                                            </div>  
                                        </div>  


                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating is-empty">
                                                    <input type="text" name="fiyat"  class="form-control" value="{{$data[0]['fiyat']}}">
                                                    <span class="material-input" ></span>
                                                </div>
                                            </div>  
                                        </div>          

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <select name="yazarid" class="form-control" id="">
                                                   @foreach($yazar as $key => $value)
                                                       <option @if($value['id'] == $data[0]['yazarid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                   @endforeach
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>  

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                   <select name="kategoriid" class="form-control" id="">
                                                   @foreach($kategori as $key => $value)
                                                   <option  @if($value['id'] == $data[0]['kategoriid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                   @endforeach
                                                   </select>
                                                </div>
                                            </div>  
                                        </div>          

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                   <select name="yayineviid" class="form-control" id="">
                                                   @foreach($yayinevi as $key => $value)
                                                   <option  @if($value['id'] == $data[0]['yayineviid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                   @endforeach
                                                   </select>
                                                </div>
                                            </div>  
                                        </div>      


                                        <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Acıklama</label>
                                                <textarea name="aciklama" id="" cols="30" rows="10" class="form-control">{{$data[0]['aciklama']}}</textarea>
                                            </div>
                                        </div> 
                                        </div>      

                                        <button type="submit" class="btn btn-primary pull-right">Kitap düzenle</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection