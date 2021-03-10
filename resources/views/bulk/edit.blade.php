@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー更新ー
@endsection

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form  action="/bulk/update" method="post">
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

        @foreach($param as $params)


          @if($params->category_id == $category->id)

        <tr>
            <td><input type="checkbox" id="{{$params->name}}" value="">
              <label for="{{$params->name}}">{{$params->name}}</label></td>
            <td>{{$params->volume}}個</td>
            <td><input type="number" class="tool" name="{{$params->id}}" value=""></td>
        </tr>
          @endif
        @endforeach
      @endforeach
    </table>
@endsection

@section('footer')

  <a href="http://localhost:8000/bulk">戻る</a>
  <input type="submit" value="更新">
</form>
@endsection
