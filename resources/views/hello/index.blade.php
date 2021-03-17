@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

      @if (Auth::check())
      <tr><th>USER: {{$user->name}}(USER_ID: {{$user->id}})</th></tr>
      @endif
      <table>
      <tr>
        <th><a href="http://localhost:8000/user">ユーザー管理</a></th>
      </tr>
      </table>
      <table>
      <tr>
        <th><a href="http://localhost:8000/message">message</a></th>
      </tr>
      </table>
      <table>
      <tr>
        <th><a href="http://localhost:8000/buy_list">買い物リスト</a></th>
      </tr>
      </table>
@endsection

@section('content')
<form class="" action="/stock/delete" method="post">
@csrf
    <table>
        <tr>
            <th>
                <a href="http://localhost:8000/bulk">一括</a>
            </th>
        </tr>
        @foreach($item as $items)
            <tr>
                <th><input type="checkbox" name="id[{{ $items->id }}]" value="{{ $items->id }}">
                    <a href="/category">
                      {{ $items->name }}
                      <input type="hidden" name="category_id[{{ $items->id }}]" value="{{ $items->id }}">

                    </a>
                </th>
            </tr>
        @endforeach
    </table>
    <h2>
        <a href="http://localhost:8000/stock/create">項目追加</a>
    </h2>
    <h2>
        <input type="submit" name="" value="項目削除">
    </h2>
</form>
@endsection

@section('footer')
<a href="" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Logout
</a>
<form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
@csrf
</form>
@endsection
