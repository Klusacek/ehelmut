        <div class="ui modal customer_contact_edit">
            <i class="close icon"></i>
            <div class="header">
                Oprava kontaktních údajů
            </div>
            
            <div class="ui segment">
            <form class="ui form" action="/zakazka/upravit_kontakt" method="POST" name="editContact" id="editContact">
                @csrf
                <input type="hidden" name='id' value="{{$kontakt->id}}">
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="firma" placeholder="firma" value="{{$detail->firma ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="ico" placeholder="ico" value="{{$detail->ico ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="dic" placeholder="dic" value="{{$detail->dic ??''}}">
                    </div>
                    </div>
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="jmeno" placeholder="jmeno" value="{{$detail->jmeno ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="prijmeni" placeholder="prijmeni" value="{{$detail->prijmeni ??'' ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="tel" placeholder="tel" value="{{$detail->tel ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="email" value="{{$detail->email ??''}}">
                    </div>
                </div>
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="ulice" placeholder="ulice" value="{{$detail->ulice ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="mesto" placeholder="mesto" value="{{$detail->mesto ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="psc" placeholder="psc" value="{{$detail->psc ??''}}">
                    </div>
                </div>
                
            </form>

            <div class="actions">
                <div class="ui deny button">
                    Zrušit
                </div>
                <div class="editContact ui blue positive button">
                    Uložit 
                </div>
            </div>
        </div>
    </div>

    
    
    
    
    <div class="ui card">
        <div class="content">
     <div class="header">{{$kontakt->oznaceni}}</div>
   </div>
   <div class="content">
     <h4 class="ui sub header">
        @if (isset($detail->firma))
            Firma: {{ $detail->firma }}<br/>
            IČO:{{ $detail->ico }} DIČ:{{ $detail->dic }}
        @else
            
        @endif
     </h4>   
       
     <div class="ui small feed">
         <div class="event">
             <div class="content">
                 <div class="summary">
                    @if (isset($detail->jmeno))
                     Kontakt: {{$detail->jmeno}}
                    @endif
                    @if (isset($detail->jmeno))
                      {{$detail->prijmeni}}
                    @endif
           </div>
       </div>
   </div>
   <div class="event">
       <div class="content">
           <div class="summary">
            @if (isset($detail->tel))
                     Telefon: {{$detail->tel}}
            @endif
            <br>
            @if (isset($detail->email))
                     Email: {{$detail->email}}
            @endif
               
           </div>
       </div>
       </div>
       <div class="event">
         <div class="content">
             <div class="summary">
                @if (isset($detail->ulice))
                     {{$detail->ulice}}
                @endif
                <br>
                @if (isset($detail->mesto))
                     {{$detail->mesto}}
                @endif
                @if (isset($detail->psc))
                    , {{$detail->psc}}
                @endif
                 
               </div>
         </div>
       </div>
     </div>
   </div>
   <div class="extra content">
       <button id="customer_contact_edit_button" class="ui button">Editovat kontakt</button>
   </div>
</div>
