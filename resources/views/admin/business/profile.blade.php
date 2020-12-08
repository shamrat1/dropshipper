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
      <div class="row">
          <div class="col-md-7 card">
         <div class="card-header">
            <h5>Business Details</h5>
         </div>
         <div class="card-body business-table">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('business.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $business->id }}">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $business->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address:</label>
                            <textarea name="address" class="form-control" rows="5">{{ $business->address }}</textarea>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="form-group">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label for="customFile">
                                @if (is_null($business->image))
                                    <img src="{{ asset('/assets/images/bg-newslatter.jpg') }}" id="business_image" width="300px" alt="Business Img">
                                @else
                                    <img src="{{ asset('/business_image/'.$business->image->image) }}" id="business_image" width="300px" alt="Business Img">
                                @endif
                                
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Opening Hours:</label>
                            <input type="text" class="form-control" name="opening_hours" placeholder="EX: 10AM - 5PM" value="{{ $business->opening_hours }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile:</label>
                            <input type="number" class="form-control" name="mobile" value="{{ $business->mobile }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Does Shipping:</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary {{ $business->doesShip ? 'active':'' }}">
                                    <input type="radio" name="doesShip" id="option2" value="1" autocomplete="off" {{ $business->doesShip ? 'checked':'' }}> Yes
                                </label>
                                <label class="btn btn-secondary {{ $business->doesShip ? '':'active' }}">
                                    <input type="radio" name="doesShip" id="option3" value="0" autocomplete="off" {{ $business->doesShip ? '':'checked' }}> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="max_delivery_time">
                            <label for="">Maximum Delivery Time</label>
                            <input type="text" name="max_delivery_time" class="form-control" value="{{ $business->max_delivery_time }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Delivery Areas</label>
                            <textarea type="text" name="delivery_areas" class="form-control" value="{{ $business->max_delivery_time }}" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="Description">Description</label>
                        <textarea name="description" id="editor1" rows="10">{{ $business->description }}</textarea>
                    </div>
                </div>
                <div class="row justify-content-md-center m-3">
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </form>
         </div>
      </div>
      <div class="col-md-4 offset-1">
            <div class="card">
                <div class="card-header">
                    Edit Payment Info
                </div>
                <div class="card-body">
                    @empty($payment)
                        <form action="{{ route('business.payment.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Card Holder Name</label>
                                <input type="text" name="card_name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Card No</label>
                                <input type="number" name="card_no" required class="form-control">
                            </div>
                            <div class="row form-group">
                                <div class="col form-group">
                                    <label for="">Expiry Date</label>
                                    <input type="text" name="expiry_date" placeholder="EX: 02-2024" required class="date form-control">
                                    <small class="text-muted">Format MM-YYYY</small>
                                </div>
                                <div class="col form-group">
                                    <label for="">CVC</label>
                                    <input type="number" name="cvc" required class="form-control">
                                </div>
                            </div>
                            <div class="row pull-right">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('business.payment.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $payment->id }}">
                            <div class="form-group">
                                <label for="">Card Holder Name</label>
                                <input type="text" name="card_name" value="{{ $payment->card_name }}" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Card No</label>
                                <input type="number" name="card_no" value="{{ $payment->card_no }}" required class="form-control">
                            </div>
                            <div class="row form-group">
                                <div class="col form-group">
                                    <label for="">Expiry Date</label>
                                    <input type="text" name="expiry_date" placeholder="EX: 02-2024" value="{{ $payment->expiry_date }}" required class="date form-control">
                                    <small class="text-muted">Format MM-YYYY</small>
                                </div>
                                <div class="col form-group">
                                    <label for="">CVC</label>
                                    <input type="number" name="cvc" value="{{ $payment->cvc }}" required class="form-control">
                                </div>
                            </div>
                            <div class="row pull-right">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    @endempty
                    
                </div>
            </div>
      </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection
@section('script')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#business_image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#customFile").change(function(){
        readURL(this);
    });
    </script>
@endsection 