@extends('layout')

@section('content')
<div class="ui stackable grid">
    <div class="twelve wide column">
        <div class="ui cards">
        {{-- kontakt zakazky    --}}
        <x-card_customer_contact :$kontakt :$order></x-card_customer_contact>
        {{-- adresa montáže --}}
        <x-card_customer_montage_address>   </x-card_customer_montage_address>
    </div>

    <div class="ui modal dokumenty_list">
      <i class="close icon"></i>
      <div class="header">
          Dokumenty
      </div>
        <div class="ui embed" id="filesLink" data-url="" ></div>
    </div>    

    <div class="ui segment">
      
      {{-- vypís jednotlivých zakázek a plateb --}}
 
        <p>Historie objednávek a jejich ceny včetně DPH [Uhrazeno:0%] </p>
        
        <table class="ui celled striped  table">
        <thead class="full-width">
          <tr>
        <th>Objednávka</th>
        <th>RPDP</th>
        <th style="width:120px;">Prodejce</th>
        <th>Středisko</th>
        <th style="width: 100px;">Založena</th>
        <th>Typ</th>
        <th style="width: 100px; text-align: left;">Cena Celkem</th>
        <th>Uhrazeno</th>
        <th>Objednano</th>
        <th>Dodáno</th>
        <th>Dokumenty</th>
      </tr>
    </thead>
    <tbody>
      
      <!-- výpis objednávek a doobjednavek včetne cen -->  
               <tr>
             <td><a href="">{{$order->orderNum}}</a></td>
             <td><a href="" class="ui icon red button"><i class="industry icon"></i></a>
              
             </td>
             <td>Štěpán</td>
             <td>Ateliér Harfa</td>
             <td><a href="/zakazky/opravit_datum/2406000">2024-02-06 12:47:56</a></td>
             <td>
               <!--druhy objednavek -->
               <form name="uravit_druh" action="../upravit_druh" method="POST">
            <input type="hidden" name="id_zakazky" value="2406000">
                <select name="druhy_zakazek_id" onchange="this.form.submit()">
                                      <option value="9" selected="">Ostatní</option>
                                      <option value="1">Zaměření</option>
                                      <option value="2">Instalace</option>
                                      <option value="3">Kuchyně</option>
                                      <option value="4">Skříně, Šatny</option>
                                      <option value="5">Obývák</option>
                                      <option value="6">Ložnice</option>
                                      <option value="7">Dětský pokoj</option>
                                      <option value="8">Inter. dveře</option>
                                      <option value="10">Návrh</option>
                                      <option value="11">Kompletní interiér</option>
                                      <option value="12">Spotřebiče</option>
                                    </select>         
            </form>
             </td>
             <td> 3 103  </td>
             <td>2 000</td>
             <td><div class="ui indicating small progress objednano success" data-value="1" data-total="1" data-percent="100"><div class="bar" style="transition-duration: 300ms; width: 100%;"><div class="progress">100%</div></div><div class="label">1 z 1</div></div></td>
             <td><div class="ui indicating small progress objednano success" data-value="1" data-total="1" data-percent="100"><div class="bar" style="transition-duration: 300ms; width: 100%;"><div class="progress">100%</div></div><div class="label">1 z 1</div></div></td>
            <td>
              <button class="ui labeled icon button dokumenty_button" id="{{$order->orderNum}}">
                <i class="file alternate outline icon"></i>
                Dokumenty
              </button>
            </td>
            
            </tr>
            
      <tr>
        <td colspan="5"></td>
        <td>Celkem</td>
        <td class="negative">3 103</td>
        <td class="positive">0</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      

      
      
    </tbody>
    <tfoot class="full-width">
      <tr>
        <th colspan="5">
                       
        <button class="ui labeled orange  icon button" onclick="window.location.href='/zakazky/novy_dodatek/5594'">
              <i class="plus icon"></i>
              Nový dodatek
            </button>
          </th>
        
          <th>Doplatek</th>
          <th>3 103</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
    </tfoot>
  </table>
</div>
</div>
    {{-- poznámky --}}
    <div class="four wide column"> 
      <div class="ui top attached tabular menu">
            <div class="active item">Poznámky k 24320xx</div>
            <div class="item">Logy k 24320xx</div>
          </div>
       <x-poznamky></x-poznamky>
    {{-- konec výpisu poznamek --}}
    </div>

    </div>
    </div>
</div>
@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div>
        {{ session('error') }}
    </div>
@endif

@endsection