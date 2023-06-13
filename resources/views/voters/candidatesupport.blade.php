@extends('layouts.app')
@section('content')
<html>
<head>
  <title>Candidate Support Form</title>
</head>
<body>
  <br><br><br><br>
<div class="container">
<div class="card">
  <div class="card-body">
  <h1 class="text-center">Candidate Support Form</h1>
  

    
    <form action="{{ url('support') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="voter-name">Voter Name:</label>
        <!-- <input type="text" name="voter_name" class="form-control" value="{{Auth::User()->id}}" placeholder="{{Auth::User()->name}}" disabled> -->
        <input type="text" name="voters_name" value="{{Auth::User()->id}}" hidden>
        <input type="text" name="voter_id" class="form-control" value="{{Auth::User()->name}}" disabled>
        <!-- <select id="voter-name" name="voters_name" class="form-control">
          @foreach ($voters as $voter)
            <option value="{{ $voter->voters_id }}">{{ $voter->name }}</option>
          @endforeach
        </select> -->
      </div>

      <div class="form-group">
        <label for="candidate-name">Candidate Name:</label>
        <select id="candidate-name" name="candidates_name" class="form-control">
          @foreach ($candidates as $candidate)
            <option value="{{ $candidate->candidates_id }}">{{ $candidate->candidate_name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" class="form-control"></textarea>
      </div>
<br>
      <input type="submit" value="Save" class="btn btn-secondary btn-lg" style="width:200px; color:#fff;">
    </form>
    </div>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
