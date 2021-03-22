@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
<table>
    <form class="" action="/bulk/edit" method="post">
        @csrf
        <tr>
            <th>カテゴリー</th>
            <th>在庫</th>
            <th>入出</th>
        </tr>
        <tr>
            @foreach ($ctgrs as $ctgr)
                <th>{{$ctgr->name}}</th>
        </tr>
            @foreach($stks as $stk)
                @foreach($stk as $value)
                    <tr>
                        @if($ctgr->id == $value->category_id)
                            <td><label for="{{$value->name}}">{{$value->name}}</label></td>
                            <td>{{$value->volume}}個</td>
                            <td><input type="number" class="tool" name="volume[{{$value->id}}]" value=""></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        @endforeach
</table>
<table>
    <tr>
        <td><a href="http://localhost:8000/bulk/create">登録</a></td>
        <td><input type="submit" class="edit" value="更新"></td>
    </form>
        <td><a href="http://localhost:8000/bulk/delete">削除</a></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="http://localhost:8000/stock/index">戻る</a></td>
    </tr>
</table>
@endsection

@section('footer')

@endsection
