<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

   <head>
      @include('includes.head')
      @yield('style')
   </head>

   <body>
      
      <div class="page-wrapper">
         
         @include('includes.header')

         <div class="page-body-wrapper">

            @include('includes.left-sidebar')

            @include('includes.right-sidebar')

            @yield('content')

            @include('includes.footer')
            @yield('script')
         </div>
         
      </div>
      
   </body>
</html>