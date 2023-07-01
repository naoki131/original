<nav class="py-2 bg-light border-bottom">
  <div class="container d-flex flex-wrap">
    <ul class="nav me-auto">
      <li class="nav-item"><a href="{{route('home')}}" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About</a></li>
    </ul>
    <ul class="nav">
      @if(!Auth::check())
      <li class="nav-item"><a href="{{route('showLogin')}}" class="nav-link link-dark px-2">Login</a></li>
      <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-dark px-2">Sign up</a></li>
      @else
      <li class="nav-item">
        <form action="{{route('logout')}}" method="post">
          @csrf
          <button>ログアウト</button>
      
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          マイページ
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{route('showProfile')}}">登録情報の変更</a></li>
          <li><a class="dropdown-item" href="#">退会</a></li>
          <li><a class="dropdown-item" href="{{route('showPassword')}}">パスワードの変更</a></li>
        </ul>
      </div>
      @endif
      </form>
      </li>
    </ul>
  </div>
</nav>
<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-4">Double header</span>
    </a>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0">
      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>
  </div>
</header>