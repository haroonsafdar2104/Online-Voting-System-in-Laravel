@extends('voters.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Voter Details</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Voter Name : {{ $voters->name }}</h5>
        <hr>
        <p class="card-text">Voter Email : {{ $voters->email }}</p>
        <hr>
        <p class="card-text">Voter Password : {{ $voters->password }}</p>
        <hr>
  </div>
  </hr>
  <a href="{{ url('voter') }}" title="Back"><button class="btn btn-primary btn-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back</button></a>
  </div>
</div>
@endsection


