@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Businesses List
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">businesss</li>
                  <li class="breadcrumb-item active">business List</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="card">
         <div class="card-header">
            <h5>business Details</h5>
         </div>
         <div class="card-body business-table">
            <table class="display" id="basic-1">
               <thead>
                  <tr>
                     <th>business</th>
                     <th>Products</th>
                     <th>Created Date</th>
                     <th>Wallet Balance</th>
                     <th>Revenue</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($businesses as $item)
                      <tr>
                        <td>
                           <div class="d-flex business-list">
                              <span>{{ $item->name }}</span>
                           </div>
                        </td>
                        <td>{{ $item->products->count() }}</td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y h:i A') }}</td>
                        <td>$0</td>
                        <td>$0</td>
                        <td>
                           <div class="row">
                              <a href="#"><i class="fa fa-edit mr-2 font-success"></i></a>
                              <form action="{{ route('business.delete',$item->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-sm"><i class="fa fa-trash font-danger"></i></button>
                              </form>
                           </div>
                        </td>
                     </tr>
                  @endforeach
                  
                  
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection