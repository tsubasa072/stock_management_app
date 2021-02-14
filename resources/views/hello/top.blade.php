@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
<style>
  h1 {font-size: 80px;}
</style>
@section('title','welcome')

@section('menubar')
      @parent
@endsection

@section('content')
-在庫管理- アプリ

@endsection

@section('footer')
<a href="http://localhost:8000/stock/create">新規</a>
<a href="http://localhost:8000/stock/login">ログイン</a>
@endsection
