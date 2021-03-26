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
                                    <h4 class="title">Yazar düzenle</h4>
                                    <p class="category">Yazar düzenleyiniz</p>
                                </div>
                                <div class="card-content">
                                    <form enctype="multipart/form-data" action="{{route('admin.yazar.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                                                </div>
                                            </div>  
                                            
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                   @if($data[0]['image']!="")
                                                   <img src="{{asset($data[0]['image'])}}" style="heigth: 120px;width:120px;" alt="">

                                                   @endif
                                                    <input style="opacity: 1; position:inherit" type="file" name="image" >
                                                </div>
                                            </div>  
                                            </div> 

                                            <div class="row">
                                        
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Yazar bio</label>
                                                    <textarea name="bio" id="" cols="30" rows="10" class="form-control">{{$data[0]['bio']}}</textarea>
                                                </div>
                                            </div> 
                                            </div> 

                                            

                                        </div>      
                                        <button type="submit" class="btn btn-primary pull-right">Yazar düzenle</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection