<header>
   <!-- header inner -->
   <div class="head_top">
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           @auth
                              @if(Auth::user()->role === 'admin')
                                 <li class="nav-item"> 
                                       <a class="nav-link" href="{{ route('admin') }}">Home</a>
                                 </li>
                              @endif
                           
                              @if(Auth::user()->role === 'user')
                                 <li class="nav-item"> 
                                       <a class="nav-link" href="{{ route('listCV') }}">List CV</a>
                                 </li>
                              @endif
                           
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('usercv')}}">CV Panel</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('editUser')}}">Profile</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.contact')}}">Message</a>
                           </li>
                           <li class="nav-item">
                              <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <button type="submit" class="nav-link btn btn-link" style="padding: 0; margin: 0; background: none; border: none;">
                                    Log out
                                 </button>
                              </form>
                           </li> 
                           @else
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('login')}}">Log in</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('register')}}">Register</a>
                           </li>
                           @endauth
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="text-bg">
                     <h1>Create your Cv</h1>
                     <p>Welcome to your first step toward career success. Our powerful and intuitive CV builder helps you create a standout résumé tailored to your goals. Whether you're a student, a recent graduate, or a seasoned professional, you can design a visually polished CV in just minutes — no technical skills needed. Start now and turn opportunities into offers.</p>
                     @auth
                        <a href="{{route('usercv')}}">Start Now</a>
                     @else
                        <a href="{{route('login')}}">Start Now</a>
                     @endauth
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="text-img">
                     <figure><img src="{{asset('frontend/images/side.png')}}" alt="#" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</header>