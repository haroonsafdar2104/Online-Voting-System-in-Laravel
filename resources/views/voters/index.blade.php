@extends('voters.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting</title>
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Voters List</div>
                <div class="card-body">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
                                            <a href="{{ url('/voter/' . $item->id) }}" title="View Voter" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ url('dashboard') }}" title="Edit Student" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Candidates Support</h1>
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
                @foreach($supports as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ App\Models\candidate::find($item->id)->candidate_name }}</td>
                        <td>{{ App\Models\voter::find($item->voters_id)->name }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
</body>
</html>