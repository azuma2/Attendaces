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

  </tr>
  
  <tr>
    <td>
      <form action="{{ route('timestamp/punchin') }}" method="POST">
          @csrf
          @method('POST')
        <button type="submit" id="button1" onclick="func1()" class="btn btn-primary">出勤開始</button>
      </form>
    </td>
    <td>
        <button type="submit" id="button2" onclick="func2()" disabled>勤務終了</button>
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <form>
        <button type="submit" id="button3" onclick="func3()">休憩開始</button>
    </td>
    <td>
        <button type="submit" id="button4" onclick="func4()" disabled>休憩終了</button>
      </form>
    </td>
  </tr>
</table>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">勤怠入力</div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">名前</dt>
                        <dt class="col-sm-9">{{ Auth::user()->name }}</dt>
                        <dt class="col-sm-3">ログインID</dt>
                        <dt class="col-sm-9">{{ Auth::user()->loginid }}</dt>
                    </dl>
                    <div class="button-form">
                        <ul>
                            <li>
                                <form action="{{ route('timestamp/punchin') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" id="button1" onclick="func1()" class="btn btn-primary">出勤</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('timestamp/punchout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" id="button2" onclick="func2()" class="btn btn-success">退勤</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

<script>
        function func1() {
          document.getElementById("button1").disabled = true;
          document.getElementById("button2").disabled = false;
        }
        function func2() {
          document.getElementById("button1").disabled = false;
          document.getElementById("button2").disabled = true;
        }

        function func3() {
          document.getElementById("button3").disabled = true;
          document.getElementById("button4").disabled = false;
        }
        function func4() {
          document.getElementById("button3").disabled = false;
          document.getElementById("button4").disabled = true;
        }


</script>