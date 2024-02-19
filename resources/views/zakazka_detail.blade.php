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
            <x-customer_order_detail :$order :$id :$ceny></x-customer_order_detail>
        </div>
    </div>

      {{-- poznámky --}}
      <div class="four wide column"> 
        <div class="ui tabular menu">
          <a class="item active" data-tab="first">Poznámky</a>
          <a class="item" data-tab="second">Logy</a>
      </div>
     
      <div class="ui tab segment active" data-tab="first">
          <x-poznamky :$order :$poznamky :$id></x-poznamky>
      </div>
      
      <div class="ui tab segment" data-tab="second">
         <x-logs></x-logs>
      </div>
      {{-- konec výpisu poznamek --}}
      
    </div>

</div>


@if ($errors->any())
<div class="ui error message">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>   

@endif

@endsection