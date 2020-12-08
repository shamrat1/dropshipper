@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Product List
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Physical</li>
                  <li class="breadcrumb-item active">Product List</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row products-admin ratio_asos">
         
         {{-- <div class="col-xl-3 col-sm-6">
            <div class="card product">
               <div class="card-body">
                  <div class="product-box p-0">
                     <div class="product-imgbox">
                        <div class="product-front">
                           <img src="../assets/images/layout-2/product/1.jpg" class="img-fluid  " alt="product">
                        </div>
                        <div class="product-back">
                           <img src="../assets/images/layout-2/product/a1.jpg" class="img-fluid  " alt="product">
                        </div>
                        <div class="product-icon icon-inline">
                           <button>
                           <i class="ti-bag" ></i>
                           </button>
                           <a href="javascript:void(0)" title="Add to Wishlist">
                              <i class="ti-heart" aria-hidden="true"></i>
                           </a>
                           <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                              <i class="ti-search" aria-hidden="true"></i>
                           </a>
                           <a href="#" title="Compare">
                              <i class="fa fa-exchange" aria-hidden="true"></i>
                           </a>
                        </div>
                        <div class="new-label1">
                           <div>new</div>
                        </div>
                        <div class="on-sale1">
                           on sale
                        </div>
                     </div>
                     <div class="product-detail detail-inline p-0">
                        <div class="detail-title">
                           <div class="detail-left">
                              <div class="rating-star">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                              </div>
                              <a href="#">
                                 <h6 class="price-title">
                                 reader will be distracted.
                                 </h6>
                              </a>
                           </div>
                           <div class="detail-right">
                              <div class="check-price">
                                 $ 56.21
                              </div>
                              <div class="price">
                                 <div class="price">
                                    $ 24.05
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         @forelse($product_lists as $product)
         {{-- @dd($product->images->first()->image) --}}
         @php
             $images = $product->images;
            
         @endphp
            <div class="col-xl-3 col-sm-6">
               <div class="card product">
                  <div class="card-body">
                     <div class="product-box p-0">
                        <div class="product-imgbox">
                           <div class="product-front">
                              @if (count($images) > 0)
                                 <img src="{{ asset('product_image') }}/{{ $images->first()->image ?? "" }}" class="img-fluid" alt="{{ $product->title }}">
                              @else
                                 <img src="{{ asset('assets/images/testimonial/1.jpg') }}" class="img-fluid" alt="{{ $product->title }}">
                              @endif
                           </div>
                           <div class="product-back">
                              @if (count($images) > 0)
                                 <img src="{{ asset('product_image') }}/{{ $images->last()->image ?? "" }}" class="img-fluid" alt="{{ $product->title }}">
                              @else
                                 <img src="{{ asset('assets/images/testimonial/1.jpg') }}" class="img-fluid" alt="{{ $product->title }}">
                              @endif
                           </div>
                           <div class="product-icon icon-inline">
                              <button>
                              <i class="ti-bag" ></i>
                              </button>
                              <a href="javascript:void(0)" title="Add to Wishlist">
                                 <i class="ti-heart" aria-hidden="true"></i>
                              </a>
                              <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                 <i class="ti-search" aria-hidden="true"></i>
                              </a>
                              <a href="#" title="Compare">
                                 <i class="fa fa-exchange" aria-hidden="true"></i>
                              </a>
                           </div>
                        </div>
                        <div class="product-detail detail-inline p-0">
                           <div class="detail-title">
                              <div class="detail-left">
                                 <div class="rating-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                 </div>
                                 <a href="">
                                    <h6 class="price-title">
                                    {{ $product->title }}
                                    </h6>
                                 </a>
                              </div>
                              <div class="detail-right">
                                 <div class="check-price">
                                     @if ($product->discount > 0)
                                          {{ $product->price - $product->discount}}
                                     @else
                                     0
                                     @endif
                                 </div>
                                 <div class="price">
                                    <div class="price">
                                     {{ $product->price }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>        
                            
         @empty
            <tr class="text-center text-danger">
               <td colspan="6">No data found...</td>
            </tr>
         @endforelse  


         </div>  
         <div class="row">
            <div class="align-center">
               {{ $product_lists->links() }}
            </div>
         </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection