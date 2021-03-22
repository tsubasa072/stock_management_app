@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー更新ー
@endsection

@section('content')
@section('content')
@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form  action="/category/update" method="post">
@csrf
    <table>
      <tr>
        <th>カテゴリー</th>
        <th>在庫</th>
        <th>入出</th>
      </tr>
      <tr>
          @foreach($categories as $category)
              <th>{{$category->name}}</th>
      </tr>
          @foreach($stocks as $stock)
              @if($stock->category_id == $category->id)
                  <tr>
                      <td><label for="{{$stock->name}}">{{$stock->name}}</label></td>
                      <td>{{$stock->volume}}個</td>
                      <td>
                          <span>{{$param[$stock->id]}}個</span>
                          <input type="hidden" name="volume[{{ $stock->id }}]" value="{{ $param[$stock->id] }}">
                      </td>
                  </tr>
              @endif
          @endforeach
      @endforeach
    </table>
    <table>
    <td><h2><input type="submit" name="" value="更新"></h2></td>
    <td><a href="http://localhost:8000/category">戻る</a></td>
    </table>
</form>
@endsection

@section('footer')

@endsection
