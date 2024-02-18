
        
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

<!-- výpis objednávek a doobjednavek včetnĚ cen -->  
       <tr>
     <td><a href="">{{$order->orderNum}}</a></td>
     <td><a href="" class="ui icon red button"><i class="industry icon"></i></a></td>
     <td><a href="">Libor ŠTĚPÁN</a></td>
     <td><a href="">Ateliér Harfa</a></td>
     <td>{{\Carbon\Carbon::parse($order->cas)->format('d.m.Y')}}</td>
     <td><a href="">Kuchyně</a></td>
@if(isset($ceny))        
         <td> {{$ceny->prodejDphSum}}  </td>
         <td><a href="">20 000</a></td>
         <td>
          <div class="ui indicating small progress objednano success" 
          data-value="{{$ceny->objednanoCount}}" 
          data-total="{{$ceny->itemsCount}}" 
          data-percent="{{$ceny->objednanoPerc}}">
          <div class="bar" style="transition-duration: 300ms; width: 100%;">
            <div class="progress">{{$ceny->objednanoPerc}} %</div>
          </div>
          <div class="label">{{$ceny->objednanoCount}} z {{$ceny->itemsCount}}</div>
        </div>
      </td>
      <td><div class="ui indicating small progress objednano success" 
        data-value="{{$ceny->vyskladnenoCount}}" 
        data-total="{{$ceny->itemsCount}}" 
        data-percent="{{$ceny->dodanoPerc}}">
        <div class="bar" style="transition-duration: 300ms; width: 100%;">
          <div class="progress">
            {{$ceny->dodanoPerc}} %</div></div><div class="label">{{$ceny->dodakCount}} z {{$ceny->itemsCount}}</div>
          </div>
        </td>   
@else
      <td></td>
      <td><a href="">Přidat platbu</a></td>
      <td></td>
      <td></td> 
@endif
      <td>
        <button class="ui labeled icon button dokumenty_button" id="{{$order->orderNum}}/{{$id}}"><i class="file alternate outline icon"></i>
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
