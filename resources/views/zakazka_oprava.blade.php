@extends('layout')

@section('content')

<div class="ui centered grid">
    <div class="ui ten wide column">
    <div class="ui segment">
    <form class="ui form" method="POST" >
      @csrf
           <h4 class="ui header">Oprava detailů zakázky {{$zakazka->orderNum}}</h4>
          <div class="inline fields">
            <div class="field">                                                       
                    <select name="user">
                    @foreach ($users as $user)
                      <option  value="{{$user->id}}" {{ $user->id == $zakazka->user ? 'selected' :'' }}>{{$user->prijmeni}}</option>                          
                    @endforeach                         
                    </select>
            </div>
            <div class="field">                                                       
                  <select name="provozovna">
                    @foreach ($provozovny as $provozovna)
                      <option  value="{{$provozovna->id}}" {{ $provozovna->id == $zakazka->provozovna ? 'selected' :'' }}>{{$provozovna->nazev}}</option>                          
                    @endforeach                     
                  </select>
            </div>
            <div class="field">                                                       
                    <select name="druh">
                      @foreach ($types as $typ)
                      <option  value="{{$typ->id}}" {{ $typ->id == $zakazka->druh ? 'selected' :'' }}>{{$typ->objednavka_popis}}</option>                          
                    @endforeach                            
                    </select>
            </div>
            <div class="field">                                                       
                <select name="developer">
                  @foreach ($developers as $developer)
                    <option  value="{{$developer->id}}" {{ $developer->id == $zakazka->developer ? 'selected' :'' }}>{{$developer->nazev}}</option>                          
                  @endforeach
                </select>
        </div>
          <div>
               <button class="ui button" type="submit" name="prodejce" value="Prodejce">Uložit </button>
          </div>
    </div>
    
    </div>
    </form>     
          
          
    <div id ="zakazka_detail_info" class="ui compact segment">
          <h4 class="ui header">Kalkulačka - vyrovnání ceny</h4>
          <h4 class="ui header">Zákazník :2403000 CHLUMECKÝ - David</h4>
    <form class="ui form" method="POST">
    
          
    <table class="ui very compact striped table">
          <thead >
                <h4 class="ui header">Původní cena zakázky</h4>   
          <tr>
                <th>Cena Bez DPH</th>
                <th>DPH</th>
                <th>Cena s DPH</th>
          </tr>
          <tr>
          </thead>
                <td id="starabez">226664</td>
                <td id="staradph">27200</td>
                <td id="staras">253864</td>
          </tr>
    </table>
          <h4 class="ui header">Skutečná cena zakázky vypnit částku s DPH i Bez !!!</h4>  
          <div class="three fields">
              <div class="field">
                <input type="text" name="15bez" id="" placeholder="cena bez DPH" value="226664">
              </div>
              <div class="four wide field">
                <input type="text" disabled placeholder="DPH" value="27200">
              </div>
              <div class="field">
                <input type="text" name="15s" id="" placeholder="cena S DPH" value="253864">
              </div>
          </div>
          
    <!--      <div class="three fields">
                <div class="field">
                <input type="text" name="21bez" id="21bez" placeholder="cena bez DPH" value="0">
                </div>
              <div class="four wide field">
                <input type="text"  disabled placeholder="DPH" value="21%">
              </div>
              <div class="field">
                <input type="text" name="21s" id="21s" placeholder="cena S DPH" value="0">
              </div>
          </div>-->
           
            <button class="ui button" type="submit" name="ulozit" value="Ulož">Uložit </button>
            <a href="/zakazky/detail/5563" class="ui blue button">Zavřít </a>
            <button class="ui red button" type="submit" name="vynulovat" value="Ulož">Vynulovat Zakázku </button>
    
    </div>
    </form>
    @endsection
    