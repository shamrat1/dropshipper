@extends('layouts.app')
@section('content')
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-lg-6">
               <div class="page-header-left">
                  <h3>Comments
                  <small>Bigdeal Admin panel</small>
                  </h3>
               </div>
            </div>
            <div class="col-lg-6">
               <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Comments</li>
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
                  <h5>Manage Comment</h5>
               </div>
               <div class="card-body order-datatable">
                  <table class="display table table-bordered table-hover" id="basic-1">
                     <thead>
                        <tr class="text-center">
                           <th>User Id</th>
                           <th>Comment Type</th>
                           <th>Comment</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody >
                        @foreach($comments as $comment)  {{-- foreach don't have @empty option --}}
                          
                           <tr class="text-center">
                              {{-- <td>{{$loop->index + $SingerLists->firstItem()}}</td> --}}
                              <td>#{{ $comment->user_id}}</td>
                              <td>{{ $comment->commentable_type}}</td>
                              <td width="70%">{{ substr( $comment->comment, 0, 150) . '...' }}</td>
                              <td>{{$comment->created_at->diffForHumans() }} </td>
                              <td width="10%">
                                 <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-sm btn-info">Reply</a>
                                                    
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
</div>

@endsection