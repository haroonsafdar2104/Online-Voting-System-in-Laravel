@extends('candidates.layout')
@section('content')
 


<div class="card">
  <div class="card-header">Edit Candidate</div>
  <div class="card-body">
      
      <form action="{{ url('candidate/' .$candidate->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$candidate->id}}" id="id" />
        <label>Candidate Name</label></br>
        <input type="text" name="candidate_name" id="candidate_name" value="{{$candidate->candidate_name}}" class="form-control"></br>
        <label>CNIC</label></br>
        <input type="text" name="CNIC" id="CNIC" value="{{$candidate->CNIC}}" class="form-control"></br>
        <label>Party Name</label></br>
        <input type="text" name="party_name" id="party_name" value="{{$candidate->party_name}}" class="form-control"></br>
        <label>Electorl</label></br>
        <input type="text" name="Electoral" id="Electoral" value="{{$candidate->Electoral}}" class="form-control"></br>
        <label>Upload Image</label></br>
        <input type="file" name="image" id="image"  class="form-control"></br>
        <img src="{{ asset('uploads/candidate/'.$candidate->image) }}" width="300px">
        <br>
        <br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop