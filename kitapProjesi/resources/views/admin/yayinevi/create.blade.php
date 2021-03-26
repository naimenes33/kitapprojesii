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
                                    <h4 class="title">Yayın evi ekle</h4>
                                    <p class="category">Yayın evi oluşturunuz</p>
                                </div>
                                <div class="card-content">
                                    <form action="{{route('admin.yayinevi.create.post')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Yayın evi adı</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>  
                                        </div>      
                                        <button type="submit" class="btn btn-primary pull-right">Yayın evi ekle</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection