<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

   <head>
      @include('includes.head')
      @yield('style')
   </head>

   <body class="text-dark">
      <div id="wraper">
            @include('front.includes.header')
            @include('front.includes.sidebarl')
            @include('front.includes.sidebarr')
               @yield('main-body')

            @include('front.includes.footer')
            @yield('script')
      </div>
   </body>
</html>

{{-- N:B: This all '@include' work accroding to "views" file to bellow... --}}
