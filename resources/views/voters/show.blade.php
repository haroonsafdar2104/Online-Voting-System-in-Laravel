@extends('voters.layout')
@section('content')
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>
 
<div class="card">
  <div class="card-header">Read Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Candidate Name : {{ $voters->candidate_name }}</h5>
        <p class="card-text">CNIC : {{ $voters->CNIC }}</p>
        <p class="card-text">Party Name : {{ $voters->party_name }}</p>
        <p class="card-text">Electorl : {{ $voters->Electoral }}</p>
        <p class="card-text">Image :    <img src="{{ asset('uploads/voter/'.$voters->image) }}" width="180px" height="130px" alt="Image"></p>
  </div>
       
    </hr>
  
  </div>
</div>
</body>
 </html>
 @endsection