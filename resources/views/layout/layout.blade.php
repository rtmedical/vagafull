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

	  @include('layout.partials.footer-scripts')
  </body>
</html>
