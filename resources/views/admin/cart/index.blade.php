@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Cart List
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
         <div class="card-body business-table">
            <table class="display" id="basic-1">
               <thead>
                  <tr>
                     <th>User</th>
                     <th>Product</th>
                     <th>quantity</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($items as $item)
                      <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->product->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                           <!-- <a href="{{ route('review.approval.toggle',$item->id) }}" class="btn btn-sm @if($item->isApproved)btn-warning @else btn-success @endif" onclick="return confirm('Are you Sure about this?')"><i class="fa @if($item->isApproved)fa-times @else fa-check @endif"></i></a>
                           <a href="{{ route('review.delete',$item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure about this?')"><i class="fa fa-edit"></i></a> -->
                        </td>
                     </tr>
                  @endforeach
                  
                  
               </tbody>
            </table>
         </div>
         </div>  
         <div class="row">
            <div class="align-center">
               {{ $items->links() }}
            </div>
         </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection