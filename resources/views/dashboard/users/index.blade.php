@extends('dashboard.layouts.app')
@section('css')
<style>
.pagination{
    margin-top: 10px;
    float: right;
}

</style>
@endsection
@section('content')

  <!-- Breadcrumb-->
  <div class="row pt-2 pb-2">
    <div class="col-sm-12">


        <div class="float-sm-left">
           <h3>Users</h3>
           </div>
   <div class="btn-group float-sm-right">
   <a href="{{route('user.create')}}"> <button type="button" class="btn btn-primary"> Create User </button></a>
   </div>
 </div>
 </div>
<!-- End Breadcrumb-->


<div class="row pt-2 pb-2">
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">S#</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $user)
            <tr>
              <th scope="row">{{$loop->index+1}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->image}}</td>
              <td>
                <a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary">Edit</button></a>
                <a href="javaScript:void();" data-url="{{route("user.delete",$user->id)}}" onclick="ajaxRequest(this)"><button class="btn btn-danger">Delete</button>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
        {{$data->links() }}
      </div>
      </div>
    </div>
  </div>

</div><!--End Row-->
</div>
@endsection
