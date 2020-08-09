@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
  @parent
  インデックスページ

@endsection

@section('content')
    <p><a href="/hello/add">データ追加</a></p>
    <p>ここが本文のコンテンツです。</p>
    <table>
        <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
        @foreach($items as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
          </tr>
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
