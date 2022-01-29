<header role="banner">
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="{{url('/')}}">Blog</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
                        <ul class="navbar-nav absolute-right">

          @guest
              <li>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>@if (Route::has('register')) / <a href="{{ route('register') }}">{{ __('Register') }}</a> @endif
              </li>
            @else
             <ul class="navbar-nav mx-auto">
             
          

             
              <li class="nav-item">
                <a class="nav-link" href="{{url('article')}}">My Arrticle</a>
              </li>
             
            </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
           
            
            
          </div>
                        @endguest
                                    </ul>

          </div>
        </div>
      </nav>
    </header>


  
                        