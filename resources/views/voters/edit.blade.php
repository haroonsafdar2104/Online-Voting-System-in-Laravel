@extends('voters.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('voter/' .$voters->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$voters->id}}" id="id" />
        <label>Voter Name</label></br>
        <input type="text" name="name" id="name" value="{{$voters->name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$voters->email}}" class="form-control"></br>
        <label>Password</label></br>
        <input type="text" name="password" id="password" value="{{$voters->password}}" class="form-control"></br>
        <!-- <label>Electorl</label></br> -->
        <!-- <input type="text" name="name" id="name" value="{{$voters->Electoral}}" class="form-control"></br> -->
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop