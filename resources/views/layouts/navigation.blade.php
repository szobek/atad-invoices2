<nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <x-application-logo height="30" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('pages.dashboard') }}">Dashboard</a>
        </li>
        @if(Auth::user()->role == "admin" || Auth::user()->role == "sales")
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Számlák
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('pages.all-invoices') }}">Minden számla</a></li>
              <li><a class="dropdown-item" href="{{ route('pages.transactions-create') }}">Új számla</a></li>
              <li><a class="dropdown-item" href="{{ route('pages.transactions-to-partner') }}">Számla partnerhez
                  rendelés</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Partnerek
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('pages.all-partners') }}">Minden partner</a></li>
              <li><a class="dropdown-item" href="{{ route('pages.import.partners') }}">Partnerek importálása</a></li>
            </ul>
          </li>
        @endif
      </ul>
      <div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn btn-link">Kijelentkezés</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>


      </div>

    </div>
  </div>
</nav>