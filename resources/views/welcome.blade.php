@extends('layout')

@section('content')
<div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
            <x-zakazky_list/>
        </div>
        <div class="six wide right floated column">
           <x-montaze_list/>
        </div>
      </div>
    </div>
  </div>
@endsection