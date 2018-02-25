@extends('layout.layout')

@section('header')
  <header class="container section">
    <h4 class="header center teal-text text-lighten-2">PROGRAMA DE QUALIDADE EM RADIOTERAPIA - PQRT</h4>
    <div class="row center">
    <p class="header col s12">PLANILHA DE INTERPOLAÇÃO PARA O CÁLCULO DE k<sub>Q,Q0</sub> E k<sub>Q,Qint</sub> E DECAIMENTO DO C0-60</p>
    </div>
  </header>
  <div class="divider"></div>
@endsection

@section('content')
  <form action="{{ route('spreadsheets.store') }}" method="POST">
    {{ csrf_field() }}

    @include('layout.partials.section-a')
    <div class="divider"></div>

    @include('layout.partials.section-b')
    <div class="divider"></div>

    @include('layout.partials.section-c')
    <div class="divider"></div>

    @include('layout.partials.section-d')
    <div class="divider"></div>

    <section id="section-e" class="section">
      <div class="row">
        <div class="col s4 offset-s4">
          <button type="submit" class="btn waves-effect waves-light">Enviar</button>
        </div>
      </div>
    </section>
  </form>

@endsection