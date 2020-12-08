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
         <div class="card-body business-table">
            <table class="display" id="basic-1">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Code</th>
                     <th>Listed on</th>
                     <th>By Business</th>
                     <th>Quantity</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($products as $item)
                      <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y h:i A') }}</td>
                        <td>{{ $item->productable->name }}</td>
                        <td>{{ $item->total_product }}</td>
                        <td>
                           <form action="{{ route('product.delete',$item->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                     </tr>
                  @endforeach
                  
                  
               </tbody>
            </table>
         </div>
         </div>  
         <div class="row">
            <div class="align-center">
               {{ $products->links() }}
            </div>
         </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection