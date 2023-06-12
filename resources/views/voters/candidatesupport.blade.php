@extends('voters.layout')
@section('content')
<html>
<head>
  <title>Candidate Support Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    select, textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    /* input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    } */

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Candidate Support Form</h1>
  
  <form action="{{ url('support') }}"  method="post">
    @csrf

    <label for="candidate-name">Voter Name:</label>
    <select id="voter-name" name="voters_name" >
      @foreach ($voters as $voter)
        <option value="{{ $voter->voters_id }}">{{ $voter->name}}</option>
      @endforeach
    </select><br><br>

    <label for="candidate-name">Candidate Name:</label>
    <select id="candidate-name" name="candidates_name" >
      @foreach ($candidates as $candidate)
        <option value="{{ $candidate->candidates_id }}">{{ $candidate->candidate_name }}</option>
      @endforeach
    </select><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

    <!-- <input type="submit" value="Submit"> -->
    <input type="submit" value="Save" class="btn btn-primary flat-button"></br>
  </form>
</body>
</html>
@endsection
