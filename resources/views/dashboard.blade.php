@extends('candidates.layout')
@section('content')
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
</head>
<body>
  <div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>
    <div class="card-body">
<div class="container-fluid py-4">
  <hr>
  <div class="row center ">
    <div class="col-md-4 mb-4 ">
      <div class="card card-stats">
        <div class="card-body voters">
          <div class="row ">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center">
                <i class="fa fa-users icon " ></i>
              </div>
            </div>
            <div class="col-7 col-md-8 ">
              <div class="numbers " >
                <p class="card-category"> <strong> Total Voters </strong></p>
                <h4 class="card-title"> {{ App\Models\Voter::count() }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4 ">
      <div class="card card-stats">
        <div class="card-body candidates">
          <div class="row">
            <div class="col-4 col-md-4">
              <div class="icon-big text-center">
                <i class="fa fa-users"></i>
              </div>
            </div>
            <div class="col-4 col-md-6">
              <div class="numbers ">
                <p class="card-category"> <strong> Total Candidates </strong></p>
                <h4 class="card-title"> {{ App\Models\candidate::count() }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
  <div class="col-md-3 mb-4">
    <a href="{{ route('search') }}" class="btn btn-primary btn-lg btn-block custom-btn">Login as Voter</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('csearch') }}" class="btn btn-primary btn-lg btn-block custom-btn">Login as Candidate</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ url('/voter/create') }}" class="btn btn-success btn-lg btn-block custom-btn">Register as Voter</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ url('/candidate/create') }}" class="btn btn-success btn-lg btn-block custom-btn">Register as Candidate</a>
  </div>
</div>
<!-- <div class="row" >
  <div class="col-md-12 mb-4">
    <a href="#" class="btn btn-info btn-lg btn-block custom-btn">View Results</a>
  </div>
</div> -->
</div>



<section class="section py-5 bg-light">
    <div class="container">
    <div class="alert alert-success" role="alert">{{ $success }}</div>
        <div class="card">
            <div class="text-center py-4">
                <h1 class="fw-light">Poll Result</h1>
            </div>


            <div class="card-body">

                <div class="winners mx-auto mb-3">
                    <h5 class="mb-2">Winners</h5>

                    @php
                        $sl = 1;
                    @endphp
                    <table class="table table-bordered">
                    @foreach ($winners as $winner)
                            <tr>
                                <td class="w-25">{{ $sl }}</td>
                                <td class="w-75">{{ $winner->candidate_name }}</td>
                            </tr>
                            @php
                            $sl++;
                            @endphp
                        @endforeach
                    </table>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Candidate Name</th>
                            <th>Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                            $rnk = 1;
                        @endphp
                        @foreach ($candidates as $c)
                        <tr>
                            <td>{{ $rnk }}</td>
                            <td>{{ $c->candidate_name }}</td>
                            <td>{{ $c->votes }}</td>
                        </tr>
                        @php
                            $rnk++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


    </div>
    </div>
  </div>
@endsection
<style>
  .card-category, .card-title{
    color:#fff;
    font-size:15px;
    
  }
    .custom-btn {
  font-size: 18px;
  padding: 12px 24px;
  border-radius: 50px;
  box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
  transition: all 0.2s ease-in-out;
}

.custom-btn:hover {
  background-color: #0080ff;
  color: #fff;
  box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.4);
}
.voters{
  background-color:#157347;
  box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.4);
  
}
.candidates{
  background-color:#0080ff;
  box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.4);
}
.fa.fa-users {
  color:#fff;
    font-size: 50px; /* Adjust the size as needed */
  }
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 115px;
    
  }
</style>
</body>
</html>



