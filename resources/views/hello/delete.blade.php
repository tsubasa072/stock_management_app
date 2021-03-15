@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection


@section('content')
    --削除--
<form  action="/stock/destroy" method="post">
@csrf
    <table>
        <tr>
            <th>カテゴリー</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}
                    <input type="hidden" name="id[{{ $category->id }}]" value="{{ $param[ $category->id ]}}">
                </td>
            </tr>
        @endforeach
    </table>
    <table>
        <tr>
            <td><a href="http://localhost:8000/stock/index">戻る</a></td>
            <td><input type="submit" class="delete" value="削除"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')


@endsection
