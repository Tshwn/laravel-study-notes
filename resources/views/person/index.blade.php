@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
  @parent
  検索スページ
@endsection

@section('content')
<!-- 242ページで変更 -->
<table>
  <tr><th>Data</th></tr>
  @foreach ($items as $item)
  <tr>
    <td>{{ $item->getData() }}</td>
  </tr>
  @endforeach
</table>
<!-- <table>
  <tr><th>id</th><th>Name</th><th>Mail</th><th>Age</th></tr>
  @foreach ($items as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->mail }}</td>
    <td>{{ $item->age }}</td>
  </tr>
  @endforeach
</table> -->
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection