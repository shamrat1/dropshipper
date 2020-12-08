@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Add Products
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Physical</li>
                  <li class="breadcrumb-item active">Add Product</li>
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
                  <h5>Add Product</h5>
              
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
               </div>
               <div class="card-body">
                  <div class="row product-adding">
                     <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                        @csrf
                        <div class="col-xl-5">
                           <div class="add-product">
                              <div class="row">
                                 <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                    <img src="{{ asset('assets/images/pro3/1.jpg') }}" alt="" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                 </div>
                                 <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                    <ul class="file-upload-product">
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                       <li><div class="box-input-file">
                                          <input class="upload" type="file" name="imageFile[]">
                                       <i class="fa fa-plus"></i></div></li>
                                      
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-7 needs-validation add-product-form" novalidate="">
                           {{-- <form class="needs-validation add-product-form" novalidate=""> --}}
                              
                                 {{-- <div class="form-group mb-3 row">
                                    <label for="Category_Id" class="col-xl-3 col-sm-4 mb-0">Category Name :</label>
                                       <select name="category_id" id="Category_Id" class="form-control col-xl-8 col-sm-7" value="{{ old('sub_category_id')}}">
                                          <option value="">Select Now</option>

                                          @foreach($categories as $category)
                                             <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                       </select>
                                 </div> --}}
                              <div class="form-group mb-3 row">
                                 <label for="Sub_Category_Id" class="col-xl-3 col-sm-4 mb-0">Sub Category Name :</label>
                                 <select name="sub_category_id" id="Sub_Category_Id" class="form-control col-xl-8 col-sm-7" value="{{ old('sub_category_id')}}">
                                    <option value="">Select Now</option>

                                    @foreach($subCategories as $category)
                                             <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                 </select>
                              </div>



                                 <div class="form-group mb-3 row">
                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                    <input name="title" value="{{ old('title')}}" class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                 </div>
                                 <div class="form-group mb-3 row">
                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                    <input name="price" value="{{ old('price')}}" class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="text" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                 </div>
                                  <div class="form-group mb-3 row">
                                    <label for="validationCustom022" class="col-xl-3 col-sm-4 mb-0">Discount :</label>
                                    <input name="discount" value="{{ old('discount')}}" class="form-control col-xl-8 col-sm-7" id="validationCustom022" type="text" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                 </div>
                                 <div class="form-group mb-3 row">
                                    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
                                    <input name="product_code" value="{{ old('product_code')}}" class="form-control col-xl-8 col-sm-7" id="validationCustomUsername" type="text" required="">
                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please choose Valid Code.</div>
                                 </div>
                                 <div class="form-group mb-3 row">
                                    <label for="validationCustomUsername2" class="col-xl-3 col-sm-4 mb-0">Product Slug(URL) :</label>
                                    <input name="slug" value="{{ old('slug')}}" class="form-control col-xl-8 col-sm-7" id="validationCustomUsername2" type="text" required="">
                                 </div>
                              </div>                           
                              <div class="form">
                                 <div class="row">
                                    <div class="col card">
                                       <div lass="card-header">
                                          <h5>Add Extra Details</h5>
                                          <div class="text-right">
                                             <button type="button" id="addExtraField" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                          </div>
                                       </div>
                                       <div class="card-body" id="productExtraBody">
                                          <div class="row m-1">
                                             <div class="col">
                                                <input type="text" class="form-control" name='size[]' placeholder="Size">
                                             </div>
                                             <div class="col">
                                                <input type="text" class="form-control" name='color[]' placeholder="Color">
                                             </div>
                                             <div class="col">
                                                <input type="text" class="form-control" name='quantity[]' placeholder="Quantity">
                                             </div>
                                          </div>
                                       </div>                                       
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                       <div class="input-group">
                                          <input name="total_product" value="{{ old('total_product ')}}" class="touchspin" type="text" value="1">
                                       </div>
                                    </fieldset>
                                 </div>

                                 <div class="form-group row">
                                    <label class="col-xl-3 col-sm-4 mb-0">Make Visible to Everyone</label>
                                    
                                    <div class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0 btn btn-group btn-group-toggle " data-toggle="buttons">
                                       <label class="btn btn-sm btn-info active">
                                          <input type="radio" name="isPublished" value="1" id="">Yes
                                       </label>
                                       <div class="vl"></div>
                                       <label class="btn btn-sm btn-info">
                                          <input type="radio" name="isPublished" value="0" id="">No
                                       </label>
                                    </div>
                                 </div>

                                 <div class="form-group row">
                                    <label class="col-xl-3 col-sm-4">Add Description :</label>
                                    <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                       <textarea name="description" value="{{ old('description ')}}" id="editor1" name="editor1" cols="10" rows="4"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="offset-xl-3 offset-sm-4">
                                 <button type="submit" class="btn btn-primary">Add</button>
                                 <button type="button" class="btn btn-light">Discard</button>
                              </div>
                          
                        </div>
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

@section('script')

    <script type="text/javascript">
       $(document).on('click','#addExtraField',function (e) {
          e.preventDefault()  
          console.log('here')
          var html = "<div class='row m-1'><div class='col'><input type='text' class='form-control' name='size[]' placeholder='Size'></div><div class='col'><input type='text' class='form-control' name='color[]' placeholder='Color'></div><div class='col'><input type='text' class='form-control' name='quantity[]' placeholder='Quantity'></div></div>"
          $('#productExtraBody').append(html)
       });
    </script>
@endsection


