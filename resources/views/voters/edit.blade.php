@extends('voters.layout')
@section('content')
 


<div class="card">
  <div class="card-header">Edit Candidate</div>
  <div class="card-body">
      
      <form action="{{ url('voter/' .$voters->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$voters->id}}" id="id" />
        <label>Candidate Name</label></br>
        <input type="text" name="candidate_name" id="candidate_name" value="{{$voters->candidate_name}}" class="form-control"></br>
        <label>CNIC</label></br>
        <input type="text" name="CNIC" id="CNIC" value="{{$voters->CNIC}}" class="form-control"></br>
        <label>Party Name</label></br>
        <input type="text" name="party_name" id="party_name" value="{{$voters->party_name}}" class="form-control"></br>
        <label>Electorl</label></br>
        <input type="text" name="Electoral" id="Electoral" value="{{$voters->Electoral}}" class="form-control"></br>
        <label>Upload Image</label></br>
        <input type="file" name="image" id="image"  class="form-control"></br>
        <img src="{{ asset('uploads/voter/'.$voters->image) }}" width="300px">
        <br>
        <br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop