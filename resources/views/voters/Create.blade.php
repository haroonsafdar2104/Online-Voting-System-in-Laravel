@extends('voters.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <style>
    body {
      background: #48789b ;
    }
    .card {
      width: 400px;
      margin: 0 auto;
      margin-top: 50px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-control {
      margin-bottom: 10px;
      outline:none;
    }
    .form-control:focus {
  outline-offset: -2px;
  box-shadow: 0 0 0 1px #48789b;
}
    .btn-success {
      width: 100%;
    }
    .alert {
      margin-top: 10px;
    }

    .flat-button {
        color: #48789b;
        width: 200px;
        font-size: 11px;
        letter-spacing: 3px;
        text-decoration: none;
        padding: 8px 10px;
        border: 2px solid #48789b;
        float: left;
        border-radius: 4px;
        background: 0 0;
        text-transform: uppercase;
        float: right;
        text-align: center;
        margin-right: 10px;
    }

    .flat-button:hover {
        color: #fff;
        background-color: #48789b;
    }
  </style>
</head>
<body>
  <div class="card">
  
  <div class="card-header">VOTER REGISTRATION</div>
  <div class="card-body">
      
      <form action="{{ url('voter') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="Email" id="Email" class="form-control"></br>
        <label>Password</label></br>
        <input type="text" name="password" id="party_name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success flat-button"></br>
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