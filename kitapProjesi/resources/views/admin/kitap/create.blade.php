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
                                    <h4 class="title">Kitap ekle</h4>
                                    <p class="category">Kitap oluşturunuz</p>
                                </div>
                                <div class="card-content">
                                    <form enctype="multipart/form-data" action="{{route('admin.kitap.create.post')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Kitap adı</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>  
                                      </div>      

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <input type="file" name="image" style="opacity: 1;position:inherit" class="form-control">
                                                </div>
                                            </div>  
                                        </div>  


                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Fiyat</label>
                                                    <input type="text" name="fiyat"  class="form-control">
                                                    <span class="material-input" ></span>
                                                </div>
                                            </div>  
                                        </div>          

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <select name="yazarid" class="form-control" id="">
                                                   @foreach($yazar as $key => $value)
                                                       <option value="{{$value['id']}}">{{$value['name']}}</option>
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
                                                   <option value="{{$value['id']}}">{{$value['name']}}</option>
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
                                                   <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                   @endforeach
                                                   </select>
                                                </div>
                                            </div>  
                                        </div>      


                                        <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Acıklama</label>
                                                <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div> 
                                        </div>      

                                        <button type="submit" class="btn btn-primary pull-right">Kitap ekle</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection