@extends('candidates.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Candidate registration </div>
  <div class="card-body">
      
      <form action="{{ url('candidate') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Candidate Name</label></br>
        <input type="text" name="candidate_name" id="candidate_name" class="form-control"></br>
        <label>CNIC</label></br>
        <input type="text" name="CNIC" id="CNIC" class="form-control"></br>
        <label>Party Name</label></br>
        <input type="text" name="party_name" id="party_name" class="form-control"></br>
        <label>Electoral</label></br>
        <input type="text" name="Electoral" id="Electoral" class="form-control"></br>
        <label>Upload Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop