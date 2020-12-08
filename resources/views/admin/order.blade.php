@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Orders
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Sales</li>
                  <li class="breadcrumb-item active">Orders</li>
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
                  <h5>Manage Order</h5>
               </div>
               <div class="card-body order-datatable">
                  <table class="display table table-bordered table-hover" id="basic-1">
                     <thead>
                        <tr class="text-center">
                           <th>Order Id</th>
                           <th>Product</th>
                           <th>Payment Status</th>
                           <th>Payment Method</th>
                           <th>Order Status</th>
                           <th>Date</th>
                           <th>Total</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($orders as $orders)  
                           <tr class="text-center">
                              <td>#{{ $orders->order_id}}</td>
                              <td>
                                 <div class="d-flex">
                                    <img src="../assets/images/electronics/product/25.jpg" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                    <img src="../assets/images/electronics/product/13.jpg" alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                    <img src="../assets/images/electronics/product/16.jpg" alt="" class="img-fluid img-30 blur-up lazyloaded">
                                 </div>
                              </td>
                              <td>{{ $orders->payment_status}}</td>
                              <td>{{ $orders->payment_method}}</td>
                              <td>{{ $orders->order_status}}</td>
                              <td>{{$orders->created_at->diffForHumans() }} </td>
                              <td>{{ $orders->total}}</td>
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