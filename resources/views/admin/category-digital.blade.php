@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Category
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Digital</li>
                  <li class="breadcrumb-item active">Category</li>
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
                  <h5>Digital Products</h5>
               </div>
               <div class="card-body">
                  <div class="btn-popup pull-right">
                     <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Digital Product</h5>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                 <form class="needs-validation">
                                    <div class="form">
                                       <div class="form-group">
                                          <label for="validationCustom01" class="mb-1">Category Name :</label>
                                          <input class="form-control" id="validationCustom01" type="text">
                                       </div>
                                       <div class="form-group mb-0">
                                          <label for="validationCustom02" class="mb-1">Category Image :</label>
                                          <input class="form-control" id="validationCustom02" type="file">
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button class="btn btn-primary" type="button">Save</button>
                                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <div id="basicScenario" class="product-physical"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection