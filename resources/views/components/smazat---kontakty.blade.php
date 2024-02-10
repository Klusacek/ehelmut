<div class="ui  segment">
    <form class="ui form" action="../upravit_zakazku" method="POST">
        <div class="four fields">
            <div class="field">
              <input type="text" name="prac_jmeno" placeholder="Jméno" value="Wimera WIMERA">
            </div>
            <div class="field">
             <select name="developer_id">
                                 <option value="73">GALSTIAN Smíchov</option>
                           </select>
            </div>
             <div class="field">
             <!--Zamknutí přehození prodejce, pokud na to nemá uživatel práva-->
                 <select name="prodejce_id"><option value="21">Bluďovský</option><option value="-1118">Bonus</option><option value="30">Čapek</option><option value="28">Dědek</option><option value="46">Ehlen</option><option value="-1116">Expozice</option><option value="15">Hanč</option><option value="32">Honzicek</option><option value="13">Janáček</option><option value="3">Janáčková</option><option value="4">Klusáček</option><option value="2">Klusáčková</option><option value="41">Krupka</option><option value="1114">Montaze</option><option value="1111">Naňková</option><option value="29">Objednávky</option><option value="1113">Objednavky - Zrušeno</option><option value="1112">Pokladna</option><option value="1125">Psenčíková</option><option value="33">Rosenkranz</option><option value="38">Rudolf</option><option value="44">Rygl</option><option value="20">Sadílek</option><option value="1115">Sklad</option><option value="1123">Snětina</option><option value="-1120">Storno</option><option value="35" selected="">Štěpán</option><option value="6">Švec</option><option value="7">Tlustá</option><option value="5">Tlustý</option><option value="40">Tlustý ML.</option><option value="45">Tlustý ST.</option><option value="31">Tříska</option><option value="1121">ucto</option><option value="39">Vacek</option><option value="-1117">VIP</option><option value="1124">Vokňer</option><option value="8">Vokurková</option></select>           <!--Konec zamku přehození prodejce-->
             </div>
             <div class=field> 
                <select name="developer_id">
                    <option value="73">GALSTIAN Smíchov</option>
                </select>
            </div>
        </div>

        <div class="four fields">
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="Firma">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="26440787">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="CZ36440482">
            </div>
            </div>
        <div class="four fields">
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="Jméno">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="Prijmeni">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="telefon">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="email">
            </div>
        </div>
        <div class="four fields">
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="Ulice">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="Mesto">
            </div>
            <div class="field">
                <input type="text" name="firma" placeholder="firma" value="psc">
            </div>
            <button class="ui button" type="submit">Uložit </button>
        </div>
    </form>
</div>        