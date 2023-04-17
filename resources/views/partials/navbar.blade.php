<nav class="navbar navbar-expand-lg bg-light mb-4">
  <div class="container d-flex align-items-center">
    <div class="d-flex align-items-end me-2">
      <img src="{{ asset('img/logo.png') }}" alt="logo" class="me-2">
      <h3>Shoes Shop</h3>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active fs-4" aria-current="page" href="{{ route('shoes.index') }}">Lista prodotti</a>
        </li>
      </ul>
    </div>  
   
</nav>