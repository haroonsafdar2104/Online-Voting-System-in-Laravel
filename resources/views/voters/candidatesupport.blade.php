@extends('voters.layout')
@section('content')
<html>
<head>
  <title>Candidate Support Form</title>
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

    <input type="submit" value="Submit">
  </form>
</body>
</html>
@endsection
