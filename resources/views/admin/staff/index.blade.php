@extends('layouts.app')
@section('content')

<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>{{ auth()->user()->company->name }}
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Staff</li>
                  {{-- <li class="breadcrumb-item active">Product List</li> --}}
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row products-admin ratio_asos">
         {{-- <h1>hellow</h1> --}}
         <div class="col-md-12">
             <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col card-title">All Staff's</div>
                    <div class="col card-tool text-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newStaffModal">Add New Staff</button>
                    </div>
                    </div>
                </div>


             <div class="card-body">
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Limit</th>
                             <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($staff as $item)
                             <tr>
                                <td>{{ $item->user->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->limit }}</td>
                                <td></td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
         </div>
         
         <!-- Modal -->
        <div class="modal fade" id="newStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('staff.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') isInvalid @enderror" required>
                            @error('name')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control @error('email') isInvalid @enderror" required>
                            @error('email')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Monthly Spending Limit</label>
                            <input type="text" name="limit" class="form-control @error('limit') isInvalid @enderror" required>
                            @error('limit')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" onclick="confirm('Are you Sure ?')" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection