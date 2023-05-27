@extends('candidates.layout')
@section('content')
    


<div class="container">
<div class="card">
    <div class="card-header">Login </div>
    <div class="card-body">
    <form action="{{ route('csearch') }}" method="GET">
        <Label>CNIC:</Label>
        <input type="text" name="keyword" placeholder="Enter your CNIC" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Search</button>
    </form>
    </div>
</div>
</div> 
@endsection