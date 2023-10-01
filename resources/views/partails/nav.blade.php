
<nav class="navbar navbar-expand-lg navbar-light bg-navbar mb-4">
    <div class="container">
        <a href="/" class="navbar-brand text-white"><i class="fa-solid fa-blog h5 text-warning"></i>Blog</a>
        <button type="button" class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav ">
                
            </div>
            <div class="navbar-nav ms-auto  align-items-center" id="myActive" style="position:relative">
                <a href="/" class="nav-item nav-link  text-white mx-3 {{Request::path()==='/' ? 'active':''}}">Home</a>
                <a href="{{route('post.blog')}}" class="nav-item nav-link text-white {{Request::path()==='blog' ? 'active':''}}">Blog</a>
                <a href="/posts/create" class="nav-item nav-link text-white mx-3">Post</a>

                @auth
                
                {{-- <a class="mx-3">{{auth()->user()->name}}</a> --}}
                <a class="navbar-brand nav-profile">
                    <img class="rounded-circle  " src="{{ asset('storage/'.auth()->user()->profile) }}" alt="" >
                  </a>
                  <div class="dropdown-user">
                    <ul>
                        <li>{{auth()->user()->name}}</li>
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><form class="mx-3" action="{{route('logout')}}" method="POST">
                          @csrf
                          <button class=" btn-logout" type="submit">Logout</button>
                        
                         </form>
                        </li>
    
                    </ul>
                  </div>
                  @else
                <a href="{{route('register')}}" class="nav-item nav-link text-white  {{Request::path()==='users/register' ? 'active':''}}">Register</a>
                <a href="{{route('login')}}" class="nav-item nav-link text-white  {{Request::path()==='users/login' ? 'active':''}}">Login</a>
              @endauth
         
            </div>
        </div>
    </div>
  
</nav>