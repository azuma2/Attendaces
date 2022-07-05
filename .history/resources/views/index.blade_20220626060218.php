@extends('layouts.default')

<style>
  .button1{
  border: none;
    background: transparent;
}

.button2{

  border: none;
    background: transparent;
}
</style>
@section('title', 'index.blade.php')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection


@section('content')
@if (Auth::check())
<p>{{ Auth::user()->name}}さんお疲れ様です</p>
@else
<p>ログインしていません。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）</p>
@endif
<table>
  <tr>
    <a href="/login">ログイン</a>
    <a href="/infomation">ログイン</a>
  
  </tr>
  
  <tr>
    <td>
      <form action="{{ route('timestamp/punchin') }}" method="POST">
          @csrf
          @method('POST')
        <button type="submit" id="buttonA" onclick="getElementById('buttonB').disabled = true;"  class="btn btn-primary">出勤開始</button>
      </form>
    </td>
    <td>
      <form action="{{ route('timestamp/punchout') }}" method="POST">
          @csrf
          @method('POST')
        <button type="submit" id="buttonB" onclick="getElementById('buttonA').disabled = false;" class="btn btn-primary">出勤終了</button>
      </form>
    </td>
  </tr>
  <tr>
    <td >
      <form action="{{ route('rest/restin') }}" method="POST">
          @csrf
          @method('POST')
        <button type="submit" id="button1" onclick="getElementById('button2').disabled = true;"  class="btn btn-primary">休憩開始</button>
      </form>
    </td>
    <td>
      <form action="{{ route('rest/restout') }}" method="POST">
          @csrf
          @method('POST')
        <button type="submit" id="button2" onclick="getElementById('button1').disabled = false;" class="btn btn-primary">休憩終了</button>
      </form>
    </td>
  </tr>
</table>


@endsection
