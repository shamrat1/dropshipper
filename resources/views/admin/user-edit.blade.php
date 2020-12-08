@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>User Edit
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Users</li>
                  <li class="breadcrumb-item active">User Edit</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row justify-content-md-center">
         <div class="col-sm-4 col-lg-4">
            <div class="card">
               <div class="card-header">        
                  <div class="btn-popup ull-right">
                     <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                     @csrf
                     <input type="hidden" name="id" value="{{$edit_user->id}}">
                     <div class="form">
                        <div class="form-group">
                           <label for="validationCustom01" class="mb-1">User Name :</label>
                           <input name="name" class="form-control" id="validationCustom01" type="text" value="{{ $edit_user->name }}">
                        </div>  
                        <div class="form-group">
                           <label for="validationCustom01" class="mb-1">User Email :</label>
                           <input name="email" class="form-control" id="validationCustom01" type="email" value="{{ $edit_user->email }}">
                        </div>    
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                     </div>                                                           
                  </form>                                
               </div>      
            </div>
         </div>
         <div class="col-sm-4 col-lg-4">
            <div class="card">
               <div class="card-body">
                  <form action="{{ route('user.password',$edit_user->id) }}" method="post" enctype="multipart/form-data" class="needs-validation">
                     @csrf
                     <div class="form">
                        <div class="form-group">
                           <label for="validationCustom01" class="mb-1">Password :</label>
                           <input name="password" class="form-control" id="validationCustom01" min="8" required type="password">
                           @error('password')
                              <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>  
                        <div class="form-group">
                           <label for="validationCustom01" class="mb-1">Password Confirmation :</label>
                           <input name="password_confirmation" class="form-control" id="validationCustom01" min="8" required type="password">
                        </div>    
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                     </div>                                                           
                  </form>                                
               </div>      
            </div>
         </div>
      </div>
   </div> 
</div>
@endsection