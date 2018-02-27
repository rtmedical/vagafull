@extends('layout.layout')

@section('header')
  @include('layout.partials.spreadsheet-title-header')
  @include('layout.partials.spreadsheet-header')
@endsection

@section('title', 'Planilha - edit')

@section('content')
  @include('layout.partials.form-errors')
  
  <form id="spreadsheet-form" 
      action="{{ route('spreadsheets.update', [$spreadsheet->id]) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
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
        <div class="col s6 offset-s3">
          <div class="input-field">
            <input id="title" name="title" type="text" class="validate" 
              value="{{ $spreadsheet->title }}"
              required
            >
            <label for="title">Título</label>
          </div>
          <button type="submit" class="btn waves-effect waves-light green">Salvar</button>
        </div>
      </div>
    </section>
  </form>
@endsection