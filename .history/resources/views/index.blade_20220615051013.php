@extends('layouts.default')
<style>
    th {
      background-color: #289ADC;
      color: white;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #FFFFFF;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
    svg.w-5.h-5 {  /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
</style>
@section('title', 'index.blade.php')

@section('content')
@if (Auth::check())
<p>ログイン中ユーザー: {{ Auth::user()->name  . ' メール' . {{ Auth::user()->email }}->email . ''}}</p>
@else
<p>ログインしていません。（<a href="/login">ログイン</a>｜
  <a href="/register">登録</a>）</p>
@endif
<table>
  <tr>
    <th>Data</th>
  </tr>
  
  <tr>
    <td>
      
    </td>
  </tr>
  
</table>

@endsection