@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/message_edit.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      <table>
        <tr>
          <th>題名</th>
          <td>『食材』の更新</td>
        </tr>
        <tr>
          <th>内容</th>
          <td>長ネギが 1個 追加されました。</td>
          <td>賞味期限は 21/5/5 です。</td>
        </tr>
      </table>

@endsection

@section('content')
<form  action="/message/update" method="post">
  @csrf
<table>
<td>コメント</td><td><textarea name="comment" rows="4" cols="80"></textarea></td>
</table>
@endsection

@section('footer')

  <a href="http://localhost:8000/message">戻る</a>
  <input type="submit" value="更新">
</form>
@endsection
