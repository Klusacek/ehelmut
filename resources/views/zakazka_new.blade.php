@extends('layout')

@section('content')

<form class="ui form" method="POST">
        @csrf
    <h4 class="ui dividing header">Informace o zákazníkovi</h4>
    <div class="field">
            <label>Firma</label>
            <div class="three fields">
            <div class="field">
                <input type="text" name="firma" placeholder="Firma">
            </div>
            <div class="field">
                <input type="text" name="ico" placeholder="Ičo">
            </div>
            <div class="field">
                <input type="text" name="dic" placeholder="Dič">
            </div>
        </div>
        <div class="ui button">Ověřit Dič</div>
    </div>


        <div class="field">
            <label>Jméno</label>
            <div class="two fields">
            <div class="field">
                <input type="text" name="jmeno" placeholder="Jméno">
            </div>
            <div class="field">
                <input type="text" name="prijmeni" placeholder="Příjmení">
            </div>
            </div>
        </div>

        <h4 class="ui dividing header">Orientační termín montáže</h4>
        <div class="field">

            <div class="ui fluid multiple search selection dropdown">
            <input type="hidden" name="receipt">
            <i class="dropdown icon"></i>
            <div class="default text">Vyberte ze seznamu</div>
            <div class="menu">
                <div class="item" data-value="jenny" data-text="Jenny">
                <img class="ui mini avatar image" src="/assets/images/avatar/nan.jpg">
                Jenny Hess
                </div>
                <div class="item" data-value="elliot" data-text="Elliot">
                <img class="ui mini avatar image" src="/assets/images/avatar/helen.jpg">
                Elliot Fu
                </div>
                <div class="item" data-value="stevie" data-text="Stevie">
                <img class="ui mini avatar image" src="/assets/images/avatar/nan.jpg">
                Stevie Feliciano
                </div>
                <div class="item" data-value="christian" data-text="Christian">
                <img class="ui mini avatar image" src="/assets/images/avatar/nan.jpg">
                Christian
                </div>
                <div class="item" data-value="matt" data-text="Matt">
                <img class="ui mini avatar image" src="/assets/images/avatar/nan.jpg">
                Matt
                </div>
                <div class="item" data-value="justen" data-text="Justen">
                <img class="ui mini avatar image" src="/assets/images/avatar/nan.jpg">
                Justen Kitsune
                </div>
            </div>
            </div>
        </div>
            <button class="ui blue button" type="submit">Odeslat zakázku</button>
    </form>

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