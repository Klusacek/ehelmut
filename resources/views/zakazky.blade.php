
@extends('layout')

@section('content')

<table class="ui celled table">
  <thead>
    <tr>
      <th colspan ="3">
        <form id="hledejZakazku" method="post">
          @csrf
          <div class="ui icon input">
            <input type="text" name="zakazkaSearch" value="@isset($hledej) {{$hledej}} @endisset"  placeholder="Hledat zakázku..." >
            <i class="search link icon"></i>
          </div>
        </form>
      </th>
      <th colspan="4"></th>
      <th>
        @if ($zakazky->hasPages())
          <div class="ui right floated pagination menu">
            <a href="{{$zakazky->previousPageUrl()}}" class="icon item">
              <i class="left chevron icon"></i>
            </a>    
            <a href="{{$zakazky->nextPageUrl()}}" class="icon item">
              <i class="right chevron icon"></i>
            </a> 
          </div>
          @endif
        </th> 
    </tr>
    <tr><th>Datum</th>
    <th>Zakázka</th>
    <th>Jméno</th>
    <th>telefon</th>
    <th>email</th>
    <th>xml</th>
    <th>smlouva</th>
    <th>hot-dok</th>
  </tr></thead>
  <tbody>

  @foreach ($zakazky as $zakazka)
    <tr>
        <td data-label="Name">{{\Carbon\Carbon::parse($zakazka->cas)->format('d.m.Y')}}</td>
        <td data-label="Age"><a href="">{{$zakazka->orderNum}}</a></td>
        <td data-label="Job">{{$zakazka->oznaceni}}</td>
        <td>{{$zakazka->oznaceni}}</td>
        <td>{{$zakazka->email}}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
  @endforeach    
    


  <tfoot>
      <tr>
        <th colspan="6">
          Zobrazuji {{$zakazky->count()}} zakázek z celkového počtu {{$zakazky->total()}}
        </th>
        <th colspan="2">
          strana č.:{{$zakazky->currentPage()}}
        </th>
      </tr>
  </tfoot>

  </tbody>
</table>

@endsection