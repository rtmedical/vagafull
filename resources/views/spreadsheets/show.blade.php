@extends('layout.layout')

@section('header')
  @include('layout.partials.spreadsheet-title-header')
  @include('layout.partials.spreadsheet-header')
@endsection

@section('content')
  @if (Session::has('message'))
    <div class="card-panel green">
      <span class="white-text">{{ Session::get('message') }}</span>
    </div>
  @endif

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
        <div class="btn-group">
          <a class="btn waves-effect waves-light" 
              href="{{ route('spreadsheets.edit', [$spreadsheet->id]) }}">
            Editar
          </a>&nbsp;
          <form action="{{ route('spreadsheets.destroy', [$spreadsheet->id]) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn waves-effect waves-light">Deletar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection