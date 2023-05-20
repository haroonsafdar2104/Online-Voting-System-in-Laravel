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
  <h1>ONLINE VOTING SYSTEM</h1>
  <div class="card-header">Voter registeration</div>
  <div class="card-body">
      
      <form action="{{ url('voter') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="Email" id="Email" class="form-control"></br>
        <label>Password</label></br>
        <input type="text" name="password" id="party_name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        @if (isset($status))
          <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ $status }}
          </div>
        @endif
        @if (is_null('status'))
        <!-- Display nothing if no search has been performed -->
        @endif
    </form>
   
  </div>
</div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>