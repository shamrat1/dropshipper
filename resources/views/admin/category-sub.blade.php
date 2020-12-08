@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Sub Category
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Physical</li>
                  <li class="breadcrumb-item active">Sub Category</li>
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
                  <h5>Products Sub Category</h5>
                  <div class="btn-popup pull-right">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Sub Category</button>
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{ url('physical-sub-category') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                                    @csrf
                                    <div class="form">
                                       <div class="form-group">
                                          <label for="validationCustom01" class="mb-1">Category Name :</label>
                                             <select name="category_id" id="singerType" class="form-control" value="{{ old('category_id')}}">
                                                <option value="">Select Category</option>           
                                                   @foreach($categories as $category)
                                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                                   @endforeach
                                             </select>                                     
                                       </div>
                                       <div class="form-group">
                                          <label for="validationCustom01" class="mb-1">Sub Category Name :</label>
                                          <input name="name" class="form-control" id="validationCustom01" type="text" value="{{ old('sub_category_name')}}">
                                       </div>
                                       <div class="form-group mb-0">
                                          <label for="validationCustom02" class="mb-1">Sub Category Image :</label>
                                          <input name="sub_category_image" class="form-control" id="validationCustom02" type="file">
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                 <button class="btn btn-primary" type="submit">Save</button>
                                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                              </div>
                                 </form>
                              </div>                              
                           </div>
                        </div>
                     </div>
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
                
                  <table class="table table-bordered">
                        <thead class="">
                           <tr class="text-center">
                              <th>Image</th>
                              <th>Name</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Edit</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($subCategories as $subCategory)  {{-- foreach don't have @empty option --}}
                              <tr class="text-center">
                                 {{-- <td>{{$loop->index + $SingerLists->firstItem()}}</td> --}}
                                 <td>
                                    {{-- @if (!empty($category->image))
                                        <img src="{{ asset('sub_category_image') }}/{{ $subCategory->image->image }}" class="img img-thumbnail" width="50" height="50">
                                    @endif      --}}
                                 </td>    
                                 <td>{{ $subCategory->name}}</td>
                                 <td>{{ $subCategory->subCategory__relationTo__category->name}}</td>
                                 <td>Status</td>
                                 <td width="10%">
                                    <div class="btn-group" role="group">
                                       <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                       
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
</div><!-- Themify icon-->

@endsection