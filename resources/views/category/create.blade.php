@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
@endsection

@section('content')
@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="/category/store" method="post">
@csrf
    <table>
        <tr>
            <td><input type="hidden" name="category_id" value="{{ $category->id }}"></td>
        </tr>
        <tr>
            <th>登録名</th>
            <td><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <th>数量</th>
            <td><input type="number" name="volume" value=""></td>
        </tr>
        <tr>
            <th>ユーザー名</th>
            <td><input type="text" name="user_id" value="{{Auth::id()}}"></td>
        </tr>
    </table>
    <input type="submit" value="登録">
    <a href="http://localhost:8000/category">戻る</a>
</form>

@endsection

@section('footer')


@endsection
