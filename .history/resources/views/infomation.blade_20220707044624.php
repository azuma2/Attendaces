@extends('layouts.common-main')
@section('title', 'index.blade.php')


@section('css')
<link rel="stylesheet" href="{{asset('css/infomation.css')}}">
@endsection

@section('content')

  
@foreach ($items as $item)

@endforeach



{{ Auth::user()->name}}
"{{ \Carbon\Carbon::today() }}"
{{ \Carbon\Carbon::today()->modify('-1 days')->format("Y-m-d") }}
{{ \Carbon\Carbon::today()->format("D") }}


  <hr>

<input type="reset" value="リセット" onclick="location.href='/infomation'">
<form action="/move" method="GET">
  @csrf
  <input type="submit" value="機能へ">
</form>

<form action="/serch" method="GET">
  @csrf
  <input type="hidden" name="input" value="{{ \Carbon\Carbon::today()->subDays(4)->format("Y-m-d") }}" >
  <input type="submit" value="testu">
</form>


<div class="card">
  <div class="calendar">
      <table>
        <input type="button" value="←前の日" id="back_btn">
        {{ \Carbon\Carbon::today()->format("Y-m-d") }}
        <th></th><input type="button" value="次の日→" id="next_btn">
      </table>
  </div>


  <hr>
  
    <table>
      <tr>
        <th>名前</th>
        <th>出勤開始</th>
        <th>退勤</th>
        <th>休憩開始</th>
        <th>休憩終了</th>
        <th></th>
      </tr>
     


      @foreach ($items as $item)
        @foreach ($rests as $rest)
        

      <tr>
        
        

    
        <td>
          {{$rest->restIn}}
        </td>
        <td>
          
          {{ substr($item->punchIn, 10, 10) }}
          
        </td>
        <td>
          / {{ substr($item->punchOut, 10, 10) }}
        </td>
        <td>
          {{ substr($rest->restIn, 10, 10) }}

        </td>
        <td>
          {{ substr($rest->restOut, 10, 10) }}


        </td>
      </tr>
    @endforeach
     @endforeach
    </table>
  </div>

    </table>
</div>


@endsection