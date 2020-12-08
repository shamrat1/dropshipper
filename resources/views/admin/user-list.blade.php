@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>User List
                  <small>Bigdeal Admin panel</small>
                  </h3>                 
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Users</li>
                  <li class="breadcrumb-item active">User List</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div  class="container-fluid">
      <div class="card">
         <div class="card-header">
            <h5>User Details</h5>
            <div class="btn-popup pull-right">
               <a href="{{url('create-user')}}" class="btn btn-secondary">Create User</a>
            </div>
         </div>
            @if (session('success'))
               <div class="alert alert-success">
                  <strong>Success!</strong> {{ session('success') }}
               </div>
            @endif
            @if (session('fail'))
               <div class="alert alert-danger">
                  <strong>Sorry!</strong> {{ session('fail') }}
               </div>
            @endif
            @if ($errors-> all())
               <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
               </div>
            @endif 
            
         <div class="card-body">
            <div class="card-body">
               <table class="table table-bordered">
                  <thead class="g-info">
                     <tr class="text-center">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Users as $User)                    
                        <tr class="text-center">
                           <td>
                              @if ($User)
                                  <img src="{{ asset('user_image/user.jpg')}}" class="img img-thumbnail" width="50" height="50">
                             
                              @endif   
                           </td>
                           <td>{{$User->name}}</td>
                           <td>{{$User->email}}</td>
                           <td width="10%">
                              <div class="btn-group" role="group">
                                 <button type="button" onclick="window.location.href='{{ url('edit/'.$User->id) }}'" class="btn btn-sm btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Edit</button>
                                 
                                 <a href="{{url('delete/'.$User->id)}}" onclick="confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>

                                  {{--  <a href="{{ url('delete_product')}}/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                              <a href="{{ url('edit_product')}}/{{$product->id}}" class="btn btn-sm btn-info">Edit</a> --}}
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
@endsection