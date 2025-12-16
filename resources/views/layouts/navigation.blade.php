<nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
        <x-application-logo height="30" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('pages.dashboard') }}">Dashboard</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Számlák
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('pages.all-invoices') }}">Minden számla</a></li>
            <li><a class="dropdown-item" href="{{ route('pages.transactions-create') }}">Új számla</a></li>
            <li><a class="dropdown-item" href="{{ route('pages.transactions-to-partner') }}">Számla partnerhez rendelés</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>