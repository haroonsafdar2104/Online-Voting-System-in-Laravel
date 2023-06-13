@extends('layouts.app')
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
  <div class="row justify-content-center">
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
  <div class="col-md-3 mb-4">
    <a href="{{ url('/showsupport') }}" class="btn btn-success btn-lg btn-block custom-btn">Candidate Support</a>
  </div>
</div>
</div>



<section class="section py-5 bg-light">
    <div class="container">
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
                                <!-- <td class="w-75">{{ $winner->voters_id }}</td> -->
                                
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
                            <!-- <th>Image</th> -->
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
                            <!-- <td><img src="{{ asset('uploads/candidate/'.$c->image) }}" width="70px"></td> -->
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


<section class="section py-5 bg-light">
    <div class="container">
        <div class="card">
            <div class="text-center py-4">
                <h1 class="fw-light">Candidates Support</h1>
            </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Candidate Name</th>
                    <th>Voter Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @foreach(App\Models\candidate_support::all() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ App\Models\candidate::find($item->candidates_id)->candidate_name }}</td>
                        <td>{{ App\Models\voter::find($item->voters_id)->name }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 4px;
  background-color: #f5f5f5;
  color: #333;
  border: 1px solid #ccc;
  transition: background-color 0.3s, color 0.3s;
}

.custom-btn:hover {
  background-color: #333;
  color: #fff;
  cursor: pointer;
}

.custom-btn.block {
  display: block;
  width: 100%;
}

.custom-btn.primary {
  background-color: #007bff;
  color: #fff;
  border-color: #007bff;
}

.custom-btn.primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

.custom-btn.success {
  background-color: #28a745;
  color: #fff;
  border-color: #28a745;
}

.custom-btn.success:hover {
  background-color: #1f8f3e;
  border-color: #1f8f3e;
}

.custom-btn.info {
  background-color: #17a2b8;
  color: #fff;
  border-color: #17a2b8;
}

.custom-btn.info:hover {
  background-color: #117a8b;
  border-color: #117a8b;
}

.custom-btn.secondary {
  background-color: #6c757d;
  color: #fff;
  border-color: #6c757d;
}

.custom-btn.secondary:hover {
  background-color: #4e555b;
  border-color: #4e555b;
}

.custom-btn.danger {
  background-color: #dc3545;
  color: #fff;
  border-color: #dc3545;
}

.custom-btn.danger:hover {
  background-color: #b02a37;
  border-color: #b02a37;
}
.center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 115px;
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



