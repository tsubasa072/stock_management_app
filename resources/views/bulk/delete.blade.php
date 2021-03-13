@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー削除ー
@endsection

@section('content')
<form  action="/bulk/delete_conf" method="post">
@csrf
    <table>
        <tr>
            <th>カテゴリー</th>
            <th>在庫</th>
        </tr>
        <tr>
            @foreach ($ctgrs as $ctgr)
                <th>{{$ctgr->name}}</th>
        </tr>
                @foreach($stks as $stk)
                    @foreach($stk as $value)
                        <tr>
                            @if($ctgr->id == $value->category_id)
                                <td><input type="checkbox" id="{{$value->name}}" name="id[{{$value->id}}]" value="{{$value->id}}">
                                <label for="{{$value->name}}">{{$value->name}}</label></td>
                                <td>{{$value->volume}}個</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </table>
        <table>
            <tr>
                <td><a href="http://localhost:8000/bulk">戻る</a></td>
                <td><input type="submit" class="delete" value="削除"></td>
            </tr>
        </table>
    </table>
</form>
@endsection

@section('footer')



@endsection
