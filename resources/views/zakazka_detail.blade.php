@extends('layout')

@section('content')
<div class="ui stackable grid">
    <div class="twelve wide column">
        <div class="ui cards">
          {{-- kontakt zakazky    --}}
          <x-card_customer_contact :$kontakt :$order ></x-card_customer_contact>
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
          {{-- vypis jednotlivých zakázek a plateb --}}
            <p>Historie objednávek a jejich ceny včetně DPH [Uhrazeno:0%] </p>
            <x-customer_order_detail :$order :$id></x-customer_order_detail>
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




@endsection