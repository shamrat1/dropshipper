@php
    $roles = Auth::check() ? Auth::user()->roles : null;
    if($roles){
      $company = $roles->where('name','Company')->first();
      $business = $roles->where('name','Business')->first();
      $admin = $roles->where('name','Admin')->first();
    }
@endphp
<nav class="navbar navbar-expand-lg text-center" id="main_navbar ">
      <a href="{{url('/')}}" class="navbar-brand font-weight-bold"><span class="text-light">Pick</span> <span class="text-success"> Bazar</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"> 
            <i class="fas fa-bars"></i>
         </span>
      </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav mr-auto">
         <li class="nav-item dropdown">
            <a class="nav-link font btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Select Product
            </a>
            <ul class="dropdown-menu" aria-labelledy="navbarDropdown">
               @foreach($categories as $category)
                  @if(count($category->subcategories)>0)
                     <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{$category->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{$category->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledy="navbarDropdown{{$category->id}}">
                           @foreach($category->subcategories as $subcategory)
                           <li class="text-center">
                              <button class="dropdown-item" onclick="handleCategory('{{ $subcategory->name }}')">{{ $subcategory->name }}</button>
                           </li>
                           @endforeach
                        </ul>
                     </li>
                  @else
                     <li>
                        <a class="dropdown-item" href="#">{{$category->name}}</a>
                     </li>
                  @endif
               @endforeach
            </ul>
         </li>
      </ul>
   </div>
   
   <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
         <li class="nav-item m-1">
            <a class="nav-link font btn-primary btn-outline-secondary" href="{{ url('#') }}">Offers</a>
         </li>
         <li class="nav-item m-1">
            <a class="nav-link font btn-success btn-outline-primary" href="{{ url('#') }}">Need help Product</a>
         </li>
         <li class="nav-item m-1">
            <a class="nav-link font btn-warning btn-outline-success" href="{{ url('#') }}">English</a>
         </li>
         <li class="nav-item m-1">
            <a class="nav-link font btn-info btn-outline-secondary" href="{{ url('business') }}">Business Around</a>
         </li>
         <li class="nav-item m-1">
            <a class="nav-link font btn-warning btn-outline-info" href="{{ url('#') }}">Join</a>
         </li>
      </ul>

      <ul class="navbar-nav ml-auto">
         <!-- Authentication Links -->
         @guest
            <a class="nav-link font btn-warning btn-outline-info" href="{{ url('#') }}">Join</a>
         @else
            {{-- <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
               <!-- Authentication Links --> --}}
            
               <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link font btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     @if ($admin)
                        <a href="{{ route('admin') }}" class="dropdown-item">Admin Dashboard</a>
                     @endif
                     @if ($business || $company)
                        <a href="{{ route('business') }}" class="dropdown-item">Business Dashboard</a>
                     @endif
                     
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </div>
               </li>
            
            {{-- </ul> --}}
         @endguest         
      </ul>
   </div>
</nav>
{{-- <nav class="navbar navbar-expand-sm" id="main_navbar">
   <a href="{{url('/')}}" class="navbar-brand font-weight-bold"><span class="text-dark">Pick</span> <span class="text-success"> Bazar</span></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item dropdown">
            <a class="nav-link font btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Select Product
            </a>
            <ul class="dropdown-menu" aria-labelledy="navbarDropdown">
               @foreach($categories as $category)
               @if(count($category->subcategories)>0)
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{$category->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{$category->name}}
                  </a>
                  <ul class="dropdown-menu" aria-labelledy="navbarDropdown{{$category->id}}">
                     @foreach($category->subcategories as $subcategory)
                     <li>
                        <button class="dropdown-item" onclick="handleCategory('{{ $subcategory->name }}')">{{ $subcategory->name }}</button>
                     </li>
                     @endforeach
                  </ul>
               </li>
               @else
               <li>
                  <a class="dropdown-item" href="#">{{$category->name}}</a>
               </li>
               @endif
               @endforeach
            </ul>
         </li>
      </ul>
   </div>
   <ul class="navbar-nav mr-auto">
      <li class="nav-item m-1">
         <a class="nav-link font btn-primary btn-outline-secondary" href="{{ url('#') }}">Offers</a>
      </li>
      <li class="nav-item m-1">
         <a class="nav-link font btn-success btn-outline-primary" href="{{ url('#') }}">Need help Product</a>
      </li>
      <li class="nav-item m-1">
         <a class="nav-link font btn-warning btn-outline-success" href="{{ url('#') }}">English</a>
      </li>
      <li class="nav-item m-1">
         <a class="nav-link font btn-info btn-outline-secondary" href="{{ url('business') }}">Business Around</a>
      </li>
      <li class="nav-item m-1">
         @guest
            <a class="nav-link font btn-warning btn-outline-info" href="{{ url('#') }}">Join</a>
         @else
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
               <!-- Authentication Links -->
            
               <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link font btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     @if ($admin)
                        <a href="{{ route('admin') }}" class="dropdown-item">Admin Dashboard</a>
                     @endif
                     @if ($business || $company)
                        <a href="{{ route('business') }}" class="dropdown-item">Business Dashboard</a>
                     @endif
                     
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </div>
               </li>
            
            </ul>
         @endguest
      </li>
   </ul> --}}
   
   {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
         <!-- Authentication Links -->
        
         <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link font btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               @if ($admin)
                  <a href="{{ route('admin') }}" class="dropdown-item">Admin Dashboard</a>
               @endif
               @if ($business || $company)
                  <a href="{{ route('business') }}" class="dropdown-item">Business Dashboard</a>
               @endif
               
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
               </a>
               
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
            </div>
         </li>
       
      </ul>
   </div> --}}
{{-- </nav> --}}