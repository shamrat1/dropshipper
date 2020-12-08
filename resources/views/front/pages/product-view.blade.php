@extends('front.layouts.app')
@section('main-body')
   <div class="main-body">
      <div class="card">
         <div class="row product-page-main card-body justify-content-lg-center">
            <div class="col-lg-6 product-view">
               <div class="owl-carousel owl-theme justify-content-center" id="sync1">
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>

                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>

                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>

                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>

                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
               </div>
               <div class="owl-carousel owl-theme product-preview " id="sync2">
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
                  <div class="item"><img src="{{ asset('product_image/8c5791a15c.jpeg')}}" alt="" class="blur-up lazyloaded img-thumbnail img-responsive"></div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="product-page-details product-right mb-0">
                  <h2>WOMEN PINK SHIRT</h2>
                  <h4> Price: $1.5</h4>



                  <hr>
                  <h6 class="product-title">product details</h6>
                  <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,</p>
                  <br>
                  <br>
                  <div class="product-price digits mt-2">
                     <h3>$26.00 <del>$350.00</del></h3>
                  </div>                        
               </div>
               <br>
               <br>
               <div class="m-t-15">
                  <button class="btn bg-white pc-btn" id="addcart"> <i class="fas fa-shopping-basket mr-2"></i> cart</button>
               </div>
            </div>
         </div>
      </div>

       <div class="content-body-section">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-12 bg-light p-4">
               <div>
                  <h3>Related product</h3>
               </div>
               <div class="row home">
                  @foreach($products as $product)
                  <div class="roduct-card-box col-md-2">
                     <div class="card">
                        <div class="card-header">
                           @if(count($product->images) > 0)
                              <a href="{{ route('product.single',$product->id) }}">
                                 <img class="img-thumbnail img-responsive" width="220" src="{{ asset("product_image/".$product->images->first()->image) }}"
                                      alt="Card image cap">
                              </a>
                           @else
                              <a href="{{ route('product.single',$product->id) }}">
                                 <img class="img-thumbnail img-responsive" src="{{ asset("product_image/product-image.jpg") }}"
                                      alt="Card image cap">
                              </a>
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
@endsection 
@section('script')
    <script>
       $(document).ready(function(){
         $(".owl-carousel").owlCarousel();
      });
    </script>
@endsection