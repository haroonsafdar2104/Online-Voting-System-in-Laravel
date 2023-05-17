<!-- @extends('voters.layout') -->
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
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center">
                <i class="fa fa-users"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Total Voters</p>
                <h4 class="card-title">100</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center">
                <i class="fa fa-users"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Total Candidates</p>
                <h4 class="card-title">100</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-3 mb-4">
    <a href="#" class="btn btn-primary btn-lg btn-block custom-btn">Login as Voter</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="#" class="btn btn-primary btn-lg btn-block custom-btn">Login as Candidate</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="#" class="btn btn-success btn-lg btn-block custom-btn">Register as Voter</a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ url('/voter/create') }}" class="btn btn-success btn-lg btn-block custom-btn">Register as Candidate</a>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <a href="#" class="btn btn-info btn-lg btn-block custom-btn">View Results</a>
  </div>
</div>
</div>
    </div>
    </div>
  </div>
@endsection
<style>
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
</style>
</body>
</html>



