@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Orders List
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Orders List</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row products-admin ratio_asos">
         <div class="card-body business-table">
            <table class="display" id="basic-1">
               <thead>
                  <tr>
                     <th>User</th>
                     <th>Payment Status</th>
                     <th>Order Status</th>
                     <th>Items</th>
                     <th>Total Price</th>
                     <th>Delivery Type</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($orders as $item)
                      <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->payment_status }}</td>
                        <td>{{ $item->order_status }}</td>
                        <td></td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->deliveryType }}</td>
                        <td>
                           <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                           <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                  @endforeach
                  
                  
               </tbody>
            </table>
         </div>
         </div>  
         <div class="row">
            <div class="align-center">
               {{ $orders->links() }}
            </div>
         </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection