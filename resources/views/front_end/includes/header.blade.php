
<nav class="navbar navbar-expand-lg justify-content-between header-main-top p-2">
    <ul class="navbar-nav mr-5">        
        <li class="nav-item">
          <a class="nav-link text-primary active" aria-current="page" href="#">SOCIAL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="#">FRANCHISE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-primary" href="#">BLOG</a>
        </li>
      </ul>


      <ul class="navbar-nav">        
        <li class="nav-item">
          <a class="nav-link text-primary active" aria-current="page" href="#">START TODAY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-primary" href="#">CONTACT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-primary" href="#">VIDEOS</a>
        </li>
      </ul>
</nav>


<nav class="navbar navbar-expand-lg justify-content-between header-main p-4">
    <a class="navbar-brand ml-5" href="{{ route('index') }}">PM01</a>

    <ul class="navbar-nav mr-5">        
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('package') }}">Package</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('history_deposit') }}">History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('info') }}">Info</a>
        </li>
      </ul>


      <div class="">
            @if(Auth::guard('customer')->check())
                <form action="{{ route('customer_logout') }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-primary text-white">Logout</button>
                </form>
            @else
                <a href="{{ route('customer_login') }}" type="submit" class="btn btn-primary text-white">Login</a>
            @endif
    </div>
</nav>







