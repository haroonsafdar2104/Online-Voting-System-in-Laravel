@extends('voters.layout')
@section('content')
    


<div class="container">
<div class="card">
    <div class="card-header">Search Results</div>
    <div class="card-body">
    <form action="{{ route('search') }}" method="GET">
        <Label>CNIC:</Label>
        <input type="text" name="keyword" placeholder="Enter search keyword" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Search</button>
    </form>
    </div>
</div>
</div> 
@endsection