@extends('layouts.admin')
@section('content')

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Sipariş listesi</h4>
                                    <p class="category">Burada eklenen  sipariş listesi bulabilirsiniz</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr><th>Alıcı</th>
                                            <th>Adres</th>
                                            <th>Telefon</th>
                                            <th>Mesaj</th>
                                            <th>Detay</th>
                                            <th>Sil</th>
                                          
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data  as $key=>$value)
                                            <tr>
                                                <td>{{\App\Models\User::getField($value['userid'],"name")}}</td>
                                                <td>{{$value['adres']}}</td>
                                                <td>{{$value['telefon']}}</td>
                                                <td>{{$value['mesaj']}}</td>
                                                <td><a href="{{route('admin.order.detail',['id'=>$value['id']])}}">Detay</a></td>
                                                <td><a href="{{route('admin.order.delete',['id'=>$value['id']])}}">Sil</a></td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection