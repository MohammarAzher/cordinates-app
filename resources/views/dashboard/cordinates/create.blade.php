@extends('dashboard.layouts.app')
@section('css')
<style>


</style>
@endsection
@section('content')
<div class="row pt-2 pb-2">
    <div class="col-lg-12 ">
        <div class="card">
          <div class="card-body">
          <div class="card-title">@if(isset($data)) Edit User @else Create User @endif</div>
          <hr>
           <form class="row ajaxForm" method="post" action="{{route('user.store')}}">
            @csrf
            @if(isset($data))
            <input type="hidden" value="{{$data->id}}" name="edit_id">
            @endif
          <div class="col-6 form-group">
           <label for="input-1">Username</label>
           <input type="text" class="form-control" id="username" name="username" @if(isset($data)) value="{{$data->name}}" @endif >
          </div>
          <div class="col-6 form-group">
           <label for="input-2">Email</label>
           <input type="email" class="form-control" id="email" name="email" @if(isset($data)) value="{{$data->email}}" @endif>
          </div>
          <div class="col-6 form-group">
           <label for="input-3">Password</label>
           <input type="text" class="form-control" id="password" name="password" >
          </div>
          <div class="col-6 form-group">
           <label for="input-4">Confirm Password</label>
           <input type="text" class="form-control" id="c_password" name="c_password">
          </div>
          @if(isset($data) && $data->image != null)
          <div class="col-12 form-group">
            <img src="{{asset('').$data->image}}" alt="">
           </div>
          @endif
          <div class="col-6 form-group">
           <label for="input-5">Profle Picture</label>
           <input type="file" class="form-control" id="image" name="image" >
          </div>
          <div class="col-6  form-group"></div>
          <div class="col-6  form-group">
           <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i> Register</button>
         </div>
         </form>
        </div>
        </div>
    </div>

</div><!--End Row-->
</div>
@endsection
