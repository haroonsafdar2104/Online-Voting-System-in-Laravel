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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
                <table class='table'>
                <div class="card-header">Votes List</div>
                <thread>
                <tr>
                    <th>Candidate Name</th>
                    <th>Voter Name</th>
                    <th>Vote</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                @foreach($votes as $vote)
                <tr>
                    <td>{{App\Models\candidate::find($vote->candidates_id)->candidate_name}}</td>
                        <td>{{App\Models\Voter::find($vote->voters_id)->name}}</td>
                        <td>{{ $vote->preference == 2 ? 1 : $vote->preference }}</td>
                        <td>
                        <a href="{{ url('/voter/' . $vote->id . '/edit2') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('/voter' . '/' . $vote->id . '/delete') }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
</div>
</div>
</div>
</div>
    @endsection
</body>
</html>