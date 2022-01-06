@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">食べログ保存一覧</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    show
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">ID：{{$log->id}}</li>
                        <li class="list-group-item">お店の名前：{{$log->name}}</li>
                        <li class="list-group-item">URL：<a href="{{$log->url}}" target="_blank">{{$log->url}}</a></li>
                        <li class="list-group-item">所在地：{{$log->location}}</li>
                        @if ($log->gone_date)
                        <li class="list-group-item">行った日：{{$log->gone_date}}</li>
                        @endif
                    </ul>
                    <div style="display:inline-flex">
                        <div style="margin-left:1em">
                            <form method="GET" action="{{route('logs.edit', ['id'=>$log->id])}}">
                                @csrf
                                <input type="submit" class="btn btn-info" value="変更する" />
                            </form>
                        </div>
                        <div style="margin-left:1em">
                            <form method="POST" action="{{route('logs.destroy',['id'=>$log->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection