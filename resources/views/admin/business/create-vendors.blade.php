@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">
                  <h3>Create Vendor
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Vendors </li>
                  <li class="breadcrumb-item active">Create Vendor </li>
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
            <div class="card tab2-card">
               <div class="card-header">
                  <h5> Add Vendor</h5>
               </div>
               <div class="card-body">
                  <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                     <li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Account</a></li>
                     <li class="nav-item"><a class="nav-link" id="permission-tabs" data-toggle="tab" href="#permission" role="tab" aria-controls="permission" aria-selected="false" data-original-title="" title="">Permission</a></li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form class="needs-validation user-add">
                           <h4>Account</h4>
                           <div class="form-group row">
                              <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> First Name</label>
                              <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" required="">
                           </div>
                           <div class="form-group row">
                              <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Last Name</label>
                              <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="text" required="">
                           </div>
                           <div class="form-group row">
                              <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                              <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="text" required="">
                           </div>
                           <div class="form-group row">
                              <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
                              <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="password" required="">
                           </div>
                           <div class="form-group row">
                              <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
                              <input class="form-control col-xl-8 col-md-7" id="validationCustom4" type="password" required="">
                           </div>
                        </form>
                     </div>
                     <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tabs">
                        <form class="needs-validation user-add">
                           <h4>Permission</h4>
                           <div class="permission-block">
                              <div class="attribute-blocks">
                                 <h5 class="f-w-600 mb-3">Product Related permition </h5>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Add Product</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani1">
                                             <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani2">
                                             <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Update Product</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani3">
                                             <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani1">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani4">
                                             <input class="radio_animated" id="edo-ani4" type="radio" name="rdo-ani1" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Delete Product</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani5">
                                             <input class="radio_animated" id="edo-ani5" type="radio" name="rdo-ani2">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani6">
                                             <input class="radio_animated" id="edo-ani6" type="radio" name="rdo-ani2" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label class="mb-0 sm-label-radio">Apply Discount</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated pb-0">
                                          <label class="d-block mb-0" for="edo-ani7">
                                             <input class="radio_animated" id="edo-ani7" type="radio" name="rdo-ani3">
                                             Allow
                                          </label>
                                          <label class="d-block mb-0" for="edo-ani8">
                                             <input class="radio_animated" id="edo-ani8" type="radio" name="rdo-ani3" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="attribute-blocks">
                                 <h5 class="f-w-600 mb-3">Category Related permition </h5>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Add Category</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani9">
                                             <input class="radio_animated" id="edo-ani9" type="radio" name="rdo-ani4">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani10">
                                             <input class="radio_animated" id="edo-ani10" type="radio" name="rdo-ani4" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Update Category</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani11">
                                             <input class="radio_animated" id="edo-ani11" type="radio" name="rdo-ani5">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani12">
                                             <input class="radio_animated" id="edo-ani12" type="radio" name="rdo-ani5" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label>Delete Category</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                          <label class="d-block" for="edo-ani13">
                                             <input class="radio_animated" id="edo-ani13" type="radio" name="rdo-ani6">
                                             Allow
                                          </label>
                                          <label class="d-block" for="edo-ani14">
                                             <input class="radio_animated" id="edo-ani14" type="radio" name="rdo-ani6" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xl-3 col-sm-4">
                                       <label class="mb-0 sm-label-radio">Apply discount</label>
                                    </div>
                                    <div class="col-xl-9 col-sm-8">
                                       <div class="form-group m-checkbox-inline custom-radio-ml d-flex radio-animated pb-0">
                                          <label class="d-block mb-0" for="edo-ani15">
                                             <input class="radio_animated" id="edo-ani15" type="radio" name="rdo-ani7">
                                             Allow
                                          </label>
                                          <label class="d-block mb-0" for="edo-ani16">
                                             <input class="radio_animated" id="edo-ani16" type="radio" name="rdo-ani7" checked="">
                                             Deny
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="pull-right">
                     <button type="button" class="btn btn-primary">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection