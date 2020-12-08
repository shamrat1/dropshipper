<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-6 footer-copyright">
             <p class="mb-0">Copyright 2019 © Bigdeal-Dashboard All rights reserved.</p>
          </div>
          <div class="col-md-6">
             <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
          </div>
       </div>
    </div>
</footer>

{{-- @include('front.includes.log-modal') --}}
   {{-- <button class="btn btn-lg bg-dgreen cbtn text-white d-none d-md-none d-lg-block cartop" id="cartop">
       <span class="citems p-1">{{ $cart != null ? $cart->count() : 0 }}</span> items <br><br> <span class="c-price bg-white text-dgreen p-1">{{ $cart != null ? $cart->sum('product.price') : 0 }}$</span>
   </button>
   <div class="mscbtn w-100 text-center d-block d-md-block d-lg-none">
      <button class="mbs cbtn w-100 mx-2 bg-dgreen p-2 mx-2 cartop" id="cartop">
         <span class="float-left text-white">
            <span class="citems p-1">{{ $cart != null ? $cart->count() : 0  }}
            </span> items
         </span>
         <span class="float-right">
            <span class="c-price bg-white text-dgreen p-1 mr-1">{{ $cart != null ? $cart->sum('product.price') : 0 }}$
            </span>
         </span>
      </button>
   </div> --}}
<!-- footer end-->

<!-- Google chart js-->
<script src="{{ asset('assets/js/chart/google/google-chart-loader.js') }}"></script>

<!-- latest jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

<!--chartist js-->
<script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>


<!--Customizer admin-->
<script src="{{ asset('assets/js/admin-customizer.js') }}"></script>

<!--map js-->
<script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

<!--apex chart js-->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('assets/js/chart/flot-chart/excanvas.js') }}"></script>
<script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets/js/chart/flot-chart/jquery.flot.pie.js') }}"></script>

<!--dashboard custom js-->
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

<!-- Touchspin Js-->
<script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
<script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>

<!-- Rating Js-->
<script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
<script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>

<!-- Owlcarousel js-->
<script src="{{ asset('assets/js/dashboard/product-carousel.js') }}"></script>

<!-- Datatable js-->
<script src="{{ asset('assets/js/datatables/custom-basic.js') }}"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Jsgrid js-->
<script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/griddata-manage-product.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/jsgrid-manage-product.js') }}"></script>

<!--Datepicker jquery-->
<script src="{{ asset('assets/js/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/datepicker.custom.js') }}"></script>

<!--right sidebar js-->
<script src="{{ asset('assets/js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('assets/js/equal-height.js') }}"></script>


<!-- form validation js-->
<script src="{{ asset('assets/js/dashboard/form-validation-custom.js') }}"></script>

<!--dropzone js-->
<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>

<!-- ckeditor js-->
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>

<!-- Zoom js-->
<script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('assets/js/zoom-scripts.js') }}"></script>

<!--script admin-->
<script src="{{ asset('assets/js/admin-script.js') }}"></script>

{{-- For reports page --}}

<!-- Chartjs -->
<script src="{{ asset('assets/js/chart/chartjs/chart.min.js') }}"></script>

<!--Report chart-->
<script src="{{ asset('assets/js/admin-reports.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsH2XHEdeV4vZ7t6HN1126oOH1mGjCF4U&v=3.exp&sensor=false"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
{{-- For navbar Hover --}}
<script src="{{ asset('assets/js/bootnavbar.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.min.js') }}"></script>


 <script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 5000);
   </script>

   <script type="text/javascript">
      $(".alert").each(function(){
        var txt =  $(this).text().replace(/\s+/g,' ').trim() ;
        $(this).text(txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
      });
   </script>

   
   {{-- ajaxData --}}
   <script type="text/javascript">
      $(document).ready(function(){
         $('#Category_Id').on('change',function(){
            var categoryId = $(this).val();
            if(categoryId){
               $.ajax({
                  type:'POST',
                  url:'{{ asset('ajax/ajaxData.blade.php') }}',
                  data:'category_id='+categoryId,
                  success:function(html){
                     $('#Sub_Category_Id').html(html);
                  }
               }); 
            }else{
               $('#Sub_Category_Id').html('<option value="">Select category first</option>');
            }
         });
      });
   </script>


{{-- Datatable --}}
{{-- <script type="text/javascript">
   $('.table').DataTable({
      "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ]
   });
</script> --}}

<script type="text/javascript">
   
   $(document).ready( function () {
      $('.table').DataTable();
   } );

   $('.table').dataTable( {
     "pageLength": 8
   } );
</script>


   <!--js link aria goes here-->

