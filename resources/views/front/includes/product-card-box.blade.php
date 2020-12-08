<div class="product-card-box">
   <!-- Card -->
   <div class="card pcard">
      <!-- Card image -->
      <div class="view overlay">
         <img class="card-img-top pimg" src="{{ asset('assets/img/product-image.jpg') }}"
         alt="Card image cap">
         <a href="#!">
            <div class="mask rgba-white-slight"></div>
         </a>
      </div>
      <!-- Card content -->
      <div class="card-body">
         <h5 class="p-name">Limo</h5>
         <span class="small text-secondary">12pc(s)</span>
         <div class="row p-2">
            <div class="col-6 col-md-6 p-1 pt-2">
               <span class="p-price text-dgreen font-weight-bold mt-1">$1.5</span>
            </div>
            <div class="col-6 col-md-6 p-1">
               <button class="btn bg-white pc-btn" id="addcart"> <i class="fas fa-shopping-basket mr-2"></i> cart</button>
               <div class="input-group cartpc d-none">
                  <div class="input-group-prepend">
                     <button class="btn btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                  </div>
                  <input type="text" id="qty_input" class="form-control form-control-sm" value="1" min="1">
                  <div class="input-group-prepend">
                     <button class="btn btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Card -->
</div>