<nav class="light-blue lighten-1" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="/spreadsheets" class="brand-logo">Planilhas</a>
    <ul class="right hide-on-med-and-down">
      <li class="{{ Request::path() === 'spreadsheets/create' ? 'active' : '' }}">
        <a href="/spreadsheets/create"><i class="material-icons">add_circle</i></a>
      </li>
    </ul>
    
    <ul id="nav-mobile" class="side-nav">
      <li class="{{ Request::path() === 'spreadsheets/create' ? 'active' : '' }}">
        <a href="/spreadsheets/create">
          <i class="material-icons left">add_circle</i>Adicionar
        </a>
      </li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
  </div>
</nav>
