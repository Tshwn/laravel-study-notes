@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
  @parent
  検索スページ
  <br>
  id番号を入力(例:1)
@endsection

@section('content')
<form action="/person/find" method="post">
  @csrf
  <input type="text" name="input" value="{{$input}}">
  <input type="submit" value="find">
</form>
@if (isset($item))
<table>
  <tr><th>Data</th></tr>
  <tr>
    <td>{{ $item->getData() }}</td>
  </tr>
</table>
@endif
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection