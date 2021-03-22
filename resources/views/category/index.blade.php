@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection


@section('content')
<form  action="category/edit" method="post">
@csrf
    <table>
        <tr>
            <th>カテゴリー</th>
            <th>在庫</th>
            <th>入出</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <th>{{$category->name}}</th>
            </tr>
            <tr>
            @foreach($stocks as $stock)
                @foreach($stock as $value)
                    <tr>
                        @if($category->id == $value->category_id)
                            <td>{{$value->name}}</td>
                            <td>{{$value->volume}}個</td>
                            <td>
                                <input type="number" class="tool" name="volume[{{ $value->id }}]" value="">
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
            </tr>
        @endforeach
    </table>
    <table>
        <tr>
            <td><h2><input type="submit" value="更新"></td></h2>
            <td><a href="http://localhost:8000/category/delete">削除</a></td>
        </tr>
    </table>
</form>
<table>
    <form action="category/create" method="post">
    @csrf
        <td><h2><input type="submit" name="id[{{ $param->id }}]" value="登録"></h2></td>
    </form>
</table>
@endsection

@section('footer')


@endsection
