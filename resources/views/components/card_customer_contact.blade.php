        <div class="ui modal customer_contact_edit">
            <i class="close icon"></i>
            <div class="header">
                Oprava kontaktních údajů
            </div>
            
            <div class="ui segment">
            <form class="ui form" action="/zakazka/upravit_kontakt" method="POST" name="editContact" id="editContact">
                @csrf
                <input type="hidden" name='id' value="{{$order->id}}">
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="firma" placeholder="firma" value="{{$kontakt->firma ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="ico" placeholder="ico" value="{{$kontakt->ico ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="dic" placeholder="dic" value="{{$kontakt->dic ??''}}">
                    </div>
                    </div>
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="jmeno" placeholder="jmeno" value="{{$kontakt->jmeno ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="prijmeni" placeholder="prijmeni" value="{{$kontakt->prijmeni ??'' ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="tel" placeholder="tel" value="{{$kontakt->tel ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="email" value="{{$kontakt->email ??''}}">
                    </div>
                </div>
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="ulice" placeholder="ulice" value="{{$kontakt->ulice ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="mesto" placeholder="mesto" value="{{$kontakt->mesto ??''}}">
                    </div>
                    <div class="field">
                        <input type="text" name="psc" placeholder="psc" value="{{$kontakt->psc ??''}}">
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
        @if (isset($kontakt->firma))
            Firma: {{ $kontakt->firma }}<br/>
            IČO:{{ $kontakt->ico }} DIČ:{{ $kontakt->dic }}
        @else
            
        @endif
     </h4>   
       
     <div class="ui small feed">
         <div class="event">
             <div class="content">
                 <div class="summary">
                    @if (isset($kontakt->jmeno))
                     Kontakt: {{$kontakt->jmeno}}
                    @endif
                    @if (isset($kontakt->jmeno))
                      {{$kontakt->prijmeni}}
                    @endif
           </div>
       </div>
   </div>
   <div class="event">
       <div class="content">
           <div class="summary">
            @if (isset($kontakt->tel))
                     Telefon: {{$kontakt->tel}}
            @endif
            <br>
            @if (isset($kontakt->email))
                     Email: {{$kontakt->email}}
            @endif
               
           </div>
       </div>
       </div>
       <div class="event">
         <div class="content">
             <div class="summary">
                @if (isset($kontakt->ulice))
                     {{$kontakt->ulice}}
                @endif
                <br>
                @if (isset($kontakt->mesto))
                     {{$kontakt->mesto}}
                @endif
                @if (isset($kontakt->psc))
                    , {{$kontakt->psc}}
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
