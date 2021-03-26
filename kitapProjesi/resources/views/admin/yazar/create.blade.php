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
                                    <h4 class="title">Yazar ekle</h4>
                                    <p class="category">Yazar oluşturunuz</p>
                                </div>
                                <div class="card-content">
                                    <form enctype="multipart/form-data" action="{{route('admin.yazar.create.post')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Yazar adı</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>  
                                            
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Yazar image</label>
                                                    <input style="opacity: 1; position:inherit" type="file" name="image" >
                                                </div>
                                            </div>  
                                            </div> 

                                            <div class="row">
                                        
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Yazar bio</label>
                                                    <textarea name="bio" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div> 
                                            </div> 

                                            

                                        </div>      
                                        <button type="submit" class="btn btn-primary pull-right">Yazar ekle</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection