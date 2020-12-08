@extends('front.layouts.app')
@section('style')
    <style>
       .cart-increase, .cart-decrease {
         outline: none !important;
         box-shadow: none !important;
       }
       .show {
          display: block;
       }
       .hidden{
          display: none;
       }
       #productSection .Active{
         /*display:block;*/
         opacity:1;
         -webkit-animation:fadeUp ease-in-out 0.5s;
         animation:fadeUp ease-in-out 0.5s;
      }
    </style>
@endsection
@section('main-body')
{{-- @dd(get_defined_vars()) --}}
{{-- @dd($cart->first()->product->images->first()) --}}

   <div class="main-body">
      <div class="top-banner">
         <img src="{{asset('assets/img/tbanner.png')}}" alt="" class="img-fluid t-benner">
         <div class="ban-up text-center d-none d-md-none d-lg-block">
            <h2 class="text-dark">Business Around You</h2>
            <form>
               <div class="row input-group ban-s mx-auto input-group-lg justify-content-center">
                  <input type="text" class="form-control col-4" id="searchCategoryProduct">
                  <div class="input-group-append" onclick="location.href='#productSection'">
                     {{-- <button onclick="location.href='#productSection'" class="btn input-group-text" type="button"> --}}
                        <span class="input-group-text"><i class="fas fa-search mr-2"></i> Search</span>
                     {{-- </button> --}}
                  </div>
               </div>
            </form>
         </div>
      </div>

      <div class="py-3 catcarousel d-block d-md-block d-lg-none">
         <div class="container-fluids py-2">
            {{-- <div class="owl-carousel owl-theme owl-carousel-0">
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
               <div class="item">
                  <h5 class="font-weight-bold text-dgreen">Groceries</h5>
               </div>
            </div> --}}
         </div>
         <div class="categories-msc py-2">
            <div class="dropdown">
               <button type="button" class="btn btn-light btn-block  dropdown-toggle" data-toggle="dropdown">
               <i class="fas fa-box mr-2"></i>Select Categories
               </button>
               <div class="dropdown-menu">
                  @foreach ($categories as $item)
                     <button class="dropdown-item" onclick="handleCategory('{{ $item->name }}')">{{ $item->name }}</button>
                  @endforeach
               </div>
            </div>
         </div>
      </div>

      <div class="h-carousel-sec p-4">
         <div class="container-fluid">
            <div class="owl-carousel owl-theme owl-carousel-1">
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
               <div class="item"><img src="{{asset('assets/img/cpic.png')}}" alt="" class="img-fluid img1c"></div>
            </div>            
         </div>
      </div>    

      <div class="content-body-section" id="productSection">
         <div class="row">            
            <div class="col-lg-3 col-md-3 col-12 bg-white">
               <nav id="sidebarl">  
                  <ul class="list-unstyled components pl-3">
                     @foreach($categories as $category)
                        @if(count($category->subcategories)>0)
                           <li class="">
                              <a href="#pageSubmenu{{$category->id}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggles">{{ $category->name }}</a>
                              <ul class="collapse list-unstyled" id="pageSubmenu{{$category->id}}">
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
               </nav>
            </div>     
            <div class="col-lg-9 col-md-9 col-12 bg-light pt-2">
               <div class="row home" id="products-row">
                  @foreach($products as $product)
                     <div class="product-card-box hidden col-md-3 {{ strtolower(str_replace(' ','-',$product->subCategory->category->name)) }} {{ strtolower(str_replace(' ','-',$product->subCategory->name)) }} {{ strtolower(str_replace(' ','-',$product->title)) }}">
                        <div class="card">
                           <div class="card-header">              
                                 @if(count($product->images) > 0)
                                 <button class="btn btn-link" id="product-modal-trigger-btn" data-toggle="modal" data-target="#productModal" data-image="{{$product->images}}" data-price="{{$product->price}}" data-product-title="{{ $product->title }}" data-quantity="{{ $product->total_product }}" data-description="{{ $product->description }}">
                                    <img class="img-thumbnail img-responsive" loading="lazy" width="220" src="{{ asset("product_image/".$product->images->first()->image) }}"
                                         alt="Card image cap"></button>
                                 @else
                                 <button class="btn btn-link" id="product-modal-trigger-btn" data-toggle="modal" data-target="#productModal" data-image="product-image.jpg" data-product-title="{{ $product->title }}" data-quantity="{{ $product->total_product }}" data-description="{{ $product->description }}">
                                    <img class="img-thumbnail img-responsive" src="{{ asset("product_image/product-image.jpg") }}"
                                         alt="Card image cap"></button>
                                 @endif
                              <hr>
                              <h6 class="pull-left">{{ $product->title }}</h6> 
                              <h6 class="font-weight-bold text-dblue pull-right">{{ $product->total_product }}pc(s)</h6>
                              <br>
                              <br>
                              <h6 class="p-price pull-left text-dgreen font-weight-bold">${{ $product->price }}</h6>
                        
                              <form action="{{ route('cart.store') }}" method="POST">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{ $product->id }}">
                                 <button class="pull-right btn bg-white pc-btn" id="addcart">
                                    <i class="fas fa-shopping-basket">&nbsp; cart</i></button>
                              
                                 <div class="input-group cartpc d-none">
                                    <div class="input-group-prepend">
                                       <button class="btn btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" id="qty_input" name="quantity" class="form-control form-control-sm" value="1" min="1">
                                    <div class="input-group-prepend">
                                       <button class="btn btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
<div class="modal fade " id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row product-page-main card-body justify-content-lg-center">
            <div class="col product-view">
               <div class="owl-carousel owl-theme" id="sync1">
                  
               </div>
            </div>
            {{-- <div class="col">
               <div class="product-page-details product-right mb-0">
                  <h2 id="product-title"></h2>
                  <h4 id="product-price"></h4>
                  <hr>
                  <h6 class="product-title">product details</h6>
                  <div id="product-description"> </div>
                  <br>
                  <br>
                  <div class="product-price digits mt-2">
                     <h3 id="product-discount">$26.00 <del>$350.00</del></h3>
                  </div>                        
               </div>
               <br>
               <br>
               <div class="m-t-15">
                  <button class="btn bg-white pc-btn" id="addcart"> <i class="fas fa-shopping-basket mr-2"></i> cart</button>
               </div>
            </div> --}}
         </div>
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsH2XHEdeV4vZ7t6HN1126oOH1mGjCF4U&v=3.exp&sensor=false"></script>
@guest
   <script type="text/javascript">
      $(document).ready(function() {
         $('#regModal').modal({backdrop: 'static', keyboard: false});
         $('#regModal').blur();
      });
   </script>

@endguest
<script>
   var map;
      var marker;
      var myLatlng = new google.maps.LatLng(31.0461, 34.8516);
      var geocoder = new google.maps.Geocoder();
      var infowindow = new google.maps.InfoWindow();
      function initialize() {
          var mapOptions = {
              zoom: 9,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };

          map = new google.maps.Map(document.getElementById("businessMap"), mapOptions);

          marker = new google.maps.Marker({
              map: map,
              position: myLatlng,
              draggable: true
          });

          geocoder.geocode({ 'latLng': myLatlng }, function (results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  // console.log(results)
                  if (results[0]) {
                      // $('#latitude,#longitude').show();
                      $('#businessAddress').val(results[0].formatted_address);
                      $('#lat').val(marker.getPosition().lat());
                      $('#lon').val(marker.getPosition().lng());
                      infowindow.setContent(results[0].formatted_address);
                      infowindow.open(map, marker);
                  }
              }
          });

          google.maps.event.addListener(marker, 'dragend', function () {

              geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                      if (results[0]) {
                          $('#businessAddress').val(results[0].formatted_address);
                          $('#lat').val(marker.getPosition().lat());
                          $('#lon').val(marker.getPosition().lng());
                          infowindow.setContent(results[0].formatted_address);
                          infowindow.open(map, marker);
                      }
                  }
              });
          });

      }
      google.maps.event.addDomListener(window, 'load', initialize);
      
  $("#datepicker").datepicker({
          format: "mm-yyyy",
          startView: "months",
          minViewMode: "months"
      });

  var current = 0;
  function next() {
      if (current < 3) {
          current += 1
          visibilityController()
      }
  }
  function prev() {
      if (current > 0) {
          current -= 1
          visibilityController()
      }
  }
  function visibilityController() {
      console.log(current)
      switch (current) {
          case 0:
              document.getElementById("prev-btn").style.display = "none";
              $('#pills-tabContent').find('.active').removeClass('show active');
              $('#b-tab-'+current).addClass('show active')
              break;
          case 1:
              document.getElementById("prev-btn").style.display = "inline";
              document.getElementById("next-btn").innerHTML = "Next";
            document.getElementById("next-btn").setAttribute('type','button')
              $('#pills-tabContent').find('.active').removeClass('show active');
              $('#b-tab-'+current).addClass('show active')
              break;
          case 2:
              document.getElementById("next-btn").innerHTML = "Submit";
              document.getElementById("next-btn").setAttribute('type','submit')
              $('#pills-tabContent').find('.active').removeClass('show active');
              $('#b-tab-'+current).addClass('show active')
              break;
          // case 3:
          //     document.getElementById("next-btn").innerHTML = "Submit";
          //     // $('#b-tab-1').addClass('active')
          //     break;
          default:
              break;
      }
  }
  $(function () {
    $('#main_navbar').bootnavbar();
  })
  $(document).on('click','#businessBtn',function () {
      $('#businessForm').append('<input type="hidden" name="type" value="business">')
      console.log("b added")
  });
  $(document).on('click','#companyBtn',function () {
      $('#businessForm').append('<input type="hidden" name="type" value="company">')
      console.log("c added")
  });

   $(document).ready(function () {
      filterSelection('all')
      $("#searchCategoryProduct").keyup(function(e) {
         e.preventDefault();
         var value = $(this).val().toLowerCase();
         filterSelection(value)
      });

      $(".owl-carousel").owlCarousel({
         loop:true,
         margin:10,
         responsiveClass:true,
      });


   });
   $(document).on('click','#product-modal-trigger-btn',function () {
      var images = $(this).data('image')
      // console.log($(this).data('product-title'))
      $('#sync1').empty();
      // $('#sync2').empty();
      let url = 'http://localhost:8888/pickbazar-backend/public/product_image/';
      var html = '';
      for (let index = 0; index < images.length; index++) {
         // console.log(index)
         var sync1 = "<div class='item'><img alt='product-image' width='250px' class='img-thumbnail img-responsive' loading='lazy' src='"+url+images[index]["image"]+"'></img></div>";
         html += sync1;
      }
      // console.log(html);
      $('#sync1').append(html);
      // $('#sync2').append(html);
      $('#product-title').text($(this).data('product-title'))
      $('#product-price').text($(this).data('price'))
      $('#product-description').html($(this).data('description'))
   });
   function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("product-card-box");
      // console.log(x.length)
      if (c == "all") c = "";
      // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
      for (i = 0; i < x.length; i++) {
         w3RemoveClass(x[i], "hidden");
         // console.log(x[i].className.indexOf(c))
         if (x[i].className.indexOf(c) > -1){
            w3AddClass(x[i], "show");
         }else{
            w3AddClass(x[i], "hidden");
         }
      }
   }
   // Show filtered elements
   function w3AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
         if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
         }
      }
   }

   // Hide elements that are not selected
   function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
         while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
         }
      }
      element.className = arr1.join(" ");
   }
   function handleCategory(query) {
      location.href='#productSection';
      filterSelection(query.toLowerCase());
      console.log(query)
   }
   
</script>
@endsection

