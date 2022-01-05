@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">食べログ保存一覧</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method='GET' action="{{route('logs.create')}}">
                        <button type="submit" class="btn btn-primary">新規登録</button>
                    </form>

                    @if(!$logs)
                    <br>
                    ここに保存したお店の一覧が表示されるよ
                    <br>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">店舗名</th>
                                <th scope="col">食べログURL</th>
                                <th scope="col">所在地</th>
                                <th scope="col">行った日</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <th>{{$log->id}}</th>
                                <td>{{$log->name}}</td>
                                <td><a href="{{$log->url}}" target="_blank">{{$log->url}}</a></td>
                                <td>{{$log->location}}</td>
                                @if($log->gone_date)
                                <td>{{$log->gone_date}}</td>
                                @else
                                <td>-</td>
                                @endif
                                <!-- <td><button type="submit" class="btn btn-secondary">詳細</button></td> -->
                                <td><a href="{{route('logs.show',['id'=>$log->id])}}"><button type="submit" class="btn btn-secondary">詳細</button></a></td>
                                <td>
                                    <form method="POST" action="{{route('logs.destroy',['id'=>$log->id])}}">
                                        @csrf
                                        <a href="#"><button type="submit" class="btn btn-danger">削除</button></a>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection