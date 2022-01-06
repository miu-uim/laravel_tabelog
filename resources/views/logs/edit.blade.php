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
                    editです
                    <form method="POST" action="{{route('logs.update', ['id'=>$log->id])}}">
                        @csrf
                        店舗名
                        <input type="text" name="name" value="{{$log->name}}" />
                        <br>
                        店舗URL
                        <input type="url" name="url" value="{{$log->url}}" />
                        <br>
                        所在地

                        <select name="location">
                            <option value="">選択してください</option>
                            <option value="北海道" @if($log->location === "北海道") selected @endif>北海道</option>
                            <option value="青森県" @if($log->location === "青森県") selected @endif>青森県</option>
                            <option value="岩手県" @if($log->location === "岩手県") selected @endif>岩手県</option>
                            <option value="宮城県" @if($log->location === "宮城県") selected @endif>宮城県</option>
                            <option value="秋田県" @if($log->location === "秋田県") selected @endif>秋田県</option>
                            <option value="山形県" @if($log->location === "山形県") selected @endif>山形県</option>
                            <option value="福島県" @if($log->location === "福島県") selected @endif>福島県</option>
                            <option value="茨城県" @if($log->location === "茨城県") selected @endif>茨城県</option>
                            <option value="栃木県" @if($log->location === "栃木県") selected @endif>栃木県</option>
                            <option value="群馬県" @if($log->location === "群馬県") selected @endif>群馬県</option>
                            <option value="埼玉県" @if($log->location === "埼玉県") selected @endif>埼玉県</option>
                            <option value="千葉県" @if($log->location === "千葉県") selected @endif>千葉県</option>
                            <option value="東京都" @if($log->location === "東京都") selected @endif>東京都</option>
                            <option value="神奈川県" @if($log->location === "神奈川県") selected @endif>神奈川県</option>
                            <option value="新潟県" @if($log->location === "新潟県") selected @endif>新潟県</option>
                            <option value="富山県" @if($log->location === "富山県") selected @endif>富山県</option>
                            <option value="石川県" @if($log->location === "石川県") selected @endif>石川県</option>
                            <option value="福井県" @if($log->location === "福井県") selected @endif>福井県</option>
                            <option value="長野県" @if($log->location === "長野県") selected @endif>長野県</option>
                            <option value="岐阜県" @if($log->location === "岐阜県") selected @endif>岐阜県</option>
                            <option value="静岡県" @if($log->location === "静岡県") selected @endif>静岡県</option>
                            <option value="愛知県" @if($log->location === "愛知県") selected @endif>愛知県</option>
                            <option value="三重県" @if($log->location === "三重県") selected @endif>三重県</option>
                            <option value="滋賀県" @if($log->location === "滋賀県") selected @endif>滋賀県</option>
                            <option value="京都府" @if($log->location === "京都府") selected @endif>京都府</option>
                            <option value="大阪府" @if($log->location === "大阪府") selected @endif>大阪府</option>
                            <option value="兵庫県" @if($log->location === "兵庫県") selected @endif>兵庫県</option>
                            <option value="奈良県" @if($log->location === "奈良県") selected @endif>奈良県</option>
                            <option value="和歌山県" @if($log->location === "和歌山県") selected @endif>和歌山県</option>
                            <option value="鳥取県" @if($log->location === "鳥取県") selected @endif>鳥取県</option>
                            <option value="島根県" @if($log->location === "島根県") selected @endif>島根県</option>
                            <option value="岡山県" @if($log->location === "岡山県") selected @endif>岡山県</option>
                            <option value="広島県" @if($log->location === "広島県") selected @endif>広島県</option>
                            <option value="山口県" @if($log->location === "山口県") selected @endif>山口県</option>
                            <option value="徳島県" @if($log->location === "徳島県") selected @endif>徳島県</option>
                            <option value="香川県" @if($log->location === "香川県") selected @endif>香川県</option>
                            <option value="愛媛県" @if($log->location === "愛媛県") selected @endif>愛媛県</option>
                            <option value="高知県" @if($log->location === "高知県") selected @endif>高知県</option>
                            <option value="福岡県" @if($log->location === "福岡県") selected @endif>福岡県</option>
                            <option value="佐賀県" @if($log->location === "佐賀県") selected @endif>佐賀県</option>
                            <option value="長崎県" @if($log->location === "長崎県") selected @endif>長崎県</option>
                            <option value="熊本県" @if($log->location === "熊本県") selected @endif>熊本県</option>
                            <option value="大分県" @if($log->location === "大分県") selected @endif>大分県</option>
                            <option value="宮崎県" @if($log->location === "宮崎県") selected @endif>宮崎県</option>
                            <option value="鹿児島県" @if($log->location === "鹿児島県") selected @endif>鹿児島県</option>
                            <option value="沖縄県" @if($log->location === "沖縄県") selected @endif>沖縄県</option>
                        </select>
                        <br>
                        行ったことがある
                        <input type="checkbox" name="gone" value="{{$log->gone}}" />
                        <br>
                        行った日
                        <input type="date" name="gone_date" id="gone_date" value="{{$log->gone_date}}" />
                        <br>
                        <input class="btn btn-info" type="submit" value="登録する" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection