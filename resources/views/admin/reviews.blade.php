@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Reviews
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Review</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h5>Manage Review</h5>
               </div>
               <div class="card-body order-datatable">
                  <table class="display table table-bordered table-hover" id="basic-1">
                     <thead>
                        <tr class="text-center">
                           <th>User Id</th>
                           <th>Product id</th>
                           <th>Rating</th>
                           <th>Review</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody >
                        @foreach($reviews as $review)  {{-- foreach don't have @empty option --}}
                          
                           <tr class="text-center">
                              {{-- <td>{{$loop->index + $SingerLists->firstItem()}}</td> --}}
                              <td>#{{ $review->user_id}}</td>
                              <td>{{ $review->product_id }}</td>
                              <td width="12%" class="text-center">
                                 <div class="product text-center">
                                    <div class="product-box">
                                       <div class="product-detail">
                                          <div class="detail-title">
                                             <div class="detail-left">
                                                <div class="rating-star">
                                                    @for ($i = 0; $i <= $review->rating; $i++)
                                                       <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>                              
                              <td idth="70%">{{ substr( $review->review, 0, 100) . '...' }}</td>
                              <td>{{$review->created_at->diffForHumans() }} </td>
                              <td idth="10%">
                                 <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-sm btn-info">Accept</a>
                                                    
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                 </div>        
                              </td>
                           </tr>
                        @endforeach   
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>

@endsection

