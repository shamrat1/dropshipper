<!-- Page Sidebar Start-->
@php
    $user = auth()->user();
@endphp
<div class="page-sidebar">
   <div class="sidebar custom-scrollbar">
      <div class="sidebar-user text-center">
         <div>
            <img class="img-60 rounded-circle lazyloaded blur-up" src="{{ asset('assets/images/dashboard/man.png') }}" alt="#">
         </div>
         <h6 class="mt-3 f-14">{{ $user->name }}</h6>
         <p>
            @foreach ($user->roles as $item)
                {{ $item->name }}
            @endforeach
         </p>
      </div>
      <ul class="sidebar-menu">
         <li>
            <a class="sidebar-header" href="/">
               <i data-feather="home"></i><span>Dashboard</span>
            </a>
         </li>
         @role('Business')
         <li>
            <a class="sidebar-header" href="#"><i data-feather="box"></i><span>Products</span><i class="fa fa-angle-right pull-right"></i>
         </a>
         <ul class="sidebar-submenu">
            <li>
               <a href="#"><i class="fa fa-circle"></i>
                  <span>Physical</span> <i class="fa fa-angle-right pull-right"></i>
               </a>
               <ul class="sidebar-submenu">
                  @role('Admin')
                     <li><a href="{{ url('categories') }}"><i class="fa fa-circle"></i>Category</a></li>
                     <li><a href="{{ url('category-sub') }}"><i class="fa fa-circle"></i>Sub Category</a></li>
                  @endrole
                  <li><a href="{{ route('product.list') }}"><i class="fa fa-circle"></i>Product List</a></li>
                  <li><a href="{{ route('product.detail') }}"><i class="fa fa-circle"></i>Product Detail</a></li>
                  <li><a href="{{ route('product.create') }}"><i class="fa fa-circle"></i>Add Product</a></li>
               </ul>
            </li>
         </ul>
      </li>
      
      <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
      <ul class="sidebar-submenu">
         <li><a href="{{ url('order') }}"><i class="fa fa-circle"></i>Orders</a></li>
         <li><a href="{{ url('transactions') }}"><i class="fa fa-circle"></i>Transactions</a></li>
      </ul>
   </li>
   {{-- <li><a class="sidebar-header" href="{{ url('invoice') }}"><i data-feather="archive"></i><span>Invoice</span></a> --}}
   {{-- </li> --}}
   @endrole
   {{-- <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
   <ul class="sidebar-submenu">
      <li><a href="{{ url('coupon-list') }}"><i class="fa fa-circle"></i>List Coupons</a></li>
      <li><a href="{{ url('coupon-create') }}"><i class="fa fa-circle"></i>Create Coupons </a></li>
   </ul>
</li>
<li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Pages</span><i class="fa fa-angle-right pull-right"></i></a>
<ul class="sidebar-submenu">
   <li><a href="{{ url('pages-list') }}"><i class="fa fa-circle"></i>List Page</a></li>
   <li><a href="{{ url('page-create') }}"><i class="fa fa-circle"></i>Create Page</a></li>
</ul>
</li>
<li><a class="sidebar-header" href="{{ url('media') }}"><i data-feather="camera"></i><span>Media</span></a></li>

<li><a class="sidebar-header" href="{{ url('comments') }}"><i data-feather="camera"></i><span>Comments</span></a></li>
<li><a class="sidebar-header" href="{{ url('reviews') }}"><i data-feather="camera"></i><span>Reviews</span></a></li>
<li><a class="sidebar-header" href="#"><i data-feather="align-left"></i><span>Menus</span><i class="fa fa-angle-right pull-right"></i></a>
<ul class="sidebar-submenu">
<li><a href="{{ url('menu-list') }}"><i class="fa fa-circle"></i>Menu Lists</a></li>
<li><a href="{{ url('create-menu') }}"><i class="fa fa-circle"></i>Create Menu</a></li>
</ul>
</li> --}}
@role('Admin')
<li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
   <ul class="sidebar-submenu">
      <li><a href="{{ route('user.index') }}"><i class="fa fa-circle"></i>User List</a></li>
      <li><a href="{{ route('user.create') }}"><i class="fa fa-circle"></i>Create User</a></li>
   </ul>
</li>

<li><a class="sidebar-header" href="{{ route('product.index') }}"><i data-feather="box"></i><span>Products</span><i class="fa fa-angle-right pull-right"></i></a>

<li><a class="sidebar-header" href=""><i data-feather="server"></i><span>Businesses</span><i class="fa fa-angle-right pull-right"></i></a>
   <ul class="sidebar-submenu">
      <li><a href="{{ route('business.index') }}"><i class="fa fa-circle"></i>Businesses List</a></li>
      <li><a href="{{ route('business.create') }}"><i class="fa fa-circle"></i>Add Business</a></li>
   </ul>
</li>

<li><a class="sidebar-header" href="{{ route('review.index') }}"><i data-feather="server"></i><span>Reviews</span></a>
   <!-- <ul class="sidebar-submenu">
   </ul> -->
</li>


@endrole


<li><a class="sidebar-header" href="{{ url('reports') }}"><i data-feather="bar-chart"></i><span>Reports</span></a></li>
<li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
<ul class="sidebar-submenu">
   @role('Business')
      <li><a href="{{ route('business.profile') }}">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
   @endrole

</ul>
</li>

<li><a class="sidebar-header" href="{{ route('logout') }}"><i data-feather="log-out"></i><span>Logout</span></a>
</li>
</ul>
</div>
</div>
<!-- Page Sidebar Ends-->