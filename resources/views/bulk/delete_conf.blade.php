@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー削除ー
@endsection

@section('content')
<form  action="/bulk/destroy" method="post">
@csrf
<table>
    <tr>
        <th>カテゴリー</th>
        <th>在庫</th>
    </tr>
        @foreach ($categories as $category)
            <tr>
                <th>{{$category->name}}</th>
            </tr>
            @foreach($stocks as $stock)
                <tr>
                    @if($category->id == $stock->category_id)
                        <td><label for="{{$stock->name}}">{{$stock->name}}</label></td>
                        <td>{{$stock->volume}}個
                            <input type="hidden" name="id[{{ $stock->id }}]" value="{{ $param[$stock->id] }}">
                        </td>
                    @endif
                </tr>
            @endforeach
        @endforeach
    </table>
<table>
    <tr>
        <td><a href="http://localhost:8000/bulk">戻る</a></td>
        <td><input type="submit" class="delete" value="削除"></td>
    </tr>
</table>
</form>
@endsection

@section('footer')



@endsection
