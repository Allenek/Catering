<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="  ">Catering</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <div class="collapse navbar-collapse justify-content-between">
    <ul class="navbar-nav mr-auto">
      @if(Auth::check())
      @if(auth()->user()->Uprawnienia == 3)
      <li class="nav-item">
        <a class="nav-link" href="/orders/">Zamów <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/order/showForEmployee">Wyświetl historie zamówień</a>
      </li>
      @elseif(auth()->user()->Uprawnienia == 1)
      <li class="nav-item">
        <a class="nav-link" href="/employees/">Zarządzaj pracownikami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/catering/">Zarządzaj cateringami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/order/showForAdmin">Wyświetl historie zamówień</a>
      </li>
      @elseif(auth()->user()->Uprawnienia == 2)
      <li class="nav-item">
        <a class="nav-link" href="/dishes/">Zarządzaj menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/order/showForCatering">Wyświetl zamówienia dzienne</a>
      </li>
      @endif
      @if(Auth::check())
      <li class="nav-item mr-sm-5">
        <a class="nav-link">@if(Auth::check()){{'Zalogowany jako: '.auth()->user()->Imie.' '.auth()->user()->Nazwisko}}@if(auth()->user()->Uprawnienia == 3){{' Pozostała kwota dofinansowania:  '. auth()->user()->Pozostała_kwota.'PLN'}} </li>
        </a>
        <li class="nav-item">
          <a class="nav-link" href="/orders/create/">Koszyk</a>
        </li>@endif @endif
      </li>
      </li class="nav-item float-right">
        <a class="nav-link float-right" href="{{ route('logout') }}">Wyloguj</a>
      </li>
      </li>
      @endif
      @endif
    </ul>
    <div>
  </div>
</nav>
