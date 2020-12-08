@extends('layouts.app')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create User
                        <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>   
                    <br> 
                    <div>
                     <a class="btn btn-success" href="{{asset('user-list')}}">User List</a>    
                    </div>                
                  </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users </li>
                        <li class="breadcrumb-item active">Create User </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card tab2-card">

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
                        <div class="tab-content" id="myTabContent">
                           <form  action="{{ url('create-account') }}" method="post" enctype="multipart/form-data" class="needs-validation user-add" novalidate="">
                           @csrf
                              <h4>Account Details</h4>                                   
                              <div class="form-group row">
                                  <label for="validationCustom1" class="col-xl-4 col-md-4"><span>*</span>Full Name</label>
                                  <input class="form-control col-xl-7 col-md-7" name="name" value="{{ old('name')}}" id="validationCustom1" type="text" required="">
                              </div>
                              <div class="form-group row">
                                  <label for="validationCustom2" class="col-xl-4 col-md-4"><span>*</span> Email</label>
                                  <input class="form-control col-xl-7 col-md-7" name="email" value="{{ old('name')}}" id="validationCustom2" type="email" required="">
                              </div>
                              <div class="form-group row">
                                  <label for="validationCustom3" class="col-xl-4 col-md-4"><span>*</span> Password</label>
                                  <input class="form-control col-xl-7 col-md-7" name="password" id="validationCustom3" type="password" required="">
                              </div>
                              <div class="form-group row">
                                  <label for="validationCustom4" class="col-xl-4 col-md-4"><span>*</span> Confirm Password</label>
                                  <input class="form-control col-xl-7 col-md-7" name="confirmPassword" id="validationCustom4" type="password" required="">
                              </div>
                              <div class="modal-footer">
                                 <button class="btn btn-primary btn-block" type="submit">Save</button>
                              </div>   
                             {{--  <div class="row">
                                 <button type="submit" class="btn  offset-xl-4 offset-md-4 col-xl-7 col-md-7 btn-primary">Save</button>
                              </div> --}}
                           </form>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection