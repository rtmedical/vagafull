<!doctype html>
<html lang="pt-br">
  <head>
  	@include('layout.partials.head')
  </head>

  <body>
	  @include('layout.partials.nav')

    @yield('header')

    <main role="main" class="container">
      @yield('content')
    </main><!-- /.container -->

    <div class="fixed-action-btn" style="bottom: 65px;">
      <a id="fixed-btn-up" class="btn-floating light-blue lighten-1">
        <i class="material-icons">arrow_upward</i>
      </a>
    </div>
    <div class="fixed-action-btn">
      <a id="fixed-btn-down" class="btn-floating light-blue lighten-1">
        <i class="material-icons">arrow_downward</i>
      </a>
    </div>

	  @include('layout.partials.footer-scripts')
  </body>
</html>
