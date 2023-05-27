@extends('voters.layout')
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Voters List</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/voter/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ route('search') }}" class="btn btn-success btn-sm" title="Search"><i class="fa fa-search" aria-hidden="true"></i> Search</a> -->
                        <!-- <div class="row">
  <div class="col-md-4 mb-5">
    <a href="#" class="btn btn-primary btn-md btn-block custom-btn"><i class="fas fa-sign-in-alt"></i>  Login as Voter</a>
  </div>
  <div class="col-md-4 mb-5">
    <a href="#" class="btn btn-primary btn-md btn-block custom-btn"> <i class="fas fa-sign-in-alt"> </i> Login as Candidate </a>
  </div>
  <div class="col-md-3 mb-2">
    <a href="{{ url('/voter/create') }}" class="btn btn-primary btn-md btn-block custom-btn">  <i class="fa fa-user-plus"></i> Register as Voter</a>
  </div>
  </div> -->
                        <!-- <br/>
                        <br/> -->
                        @if (isset($status))
                            <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $status }}
                            </div>
                        @endif
                        @if (is_null('status'))
                        <!-- Display nothing if no search has been performed -->
                        @endif
                        <!-- <div class="container-fluid py-4"> -->
  <!-- <div class="row">
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
  <hr>
  <div class="row">
  <div class="col-md-4 mb-5">
    <a href="#" class="btn btn-primary btn-lg btn-block custom-btn"> <i class="fa fa-user-plus"></i>  Register as Candidate</a>
  </div>

  <div class="col-md-4 mb-5">
    <a href="#" class="btn btn-primary btn-lg btn-block custom-btn"><i class="fa fa-poll"></i>  View Results</a>
  </div>
  </div>
</div> -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($voters as $item)
                                    <tr>
                                        <td>{{ $item->voters_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
 
                                        <td>

                                            <a href="{{ url('/voter/' . $item->id) }}" title="View Voter"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('dashboard') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back</button></a>

                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
</body>
</html>