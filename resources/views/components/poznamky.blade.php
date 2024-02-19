<div class="ui segment">
  <form class="ui form" method="post" action="/zakazka/poznamkaNew" name="poznamky">
    @csrf
      <div class="field">
          <label>Nová poznámka:</label>
          <input type="hidden" name="idOrder" value="{{$id}}">
          <input type="text" name="poznamka" value="">
          <input type="hidden" name="orderNum" value="{{$order->orderNum}}">
      </div>
       <input type="submit" class="ui blue submit left floated button"/>
  </form> 
</div>

{{-- vypis poznamek --}}
<div class="ui segment">
  @foreach ($poznamky as $poznamka)
      
  <div class='ui feed'>
    <div class='event'>
          <div class='label'>
            <img src='{{ asset('/assets/images/avatar') }}/{{$poznamka->user}}.jpg'>
          </div>
          <div class='content'>
            <div class='date'>
              {{$poznamka->cas}}
            </div>
            <div class='summary'>
              {{$poznamka->poznamka}}
            </div>
            <div class='meta'>komentar k zakazce: {{$poznamka->orderNum}}</div>
          </div>
        </div>
      </div>
      <div class='ui divider'></div>  
      
      @endforeach
      
  </div>