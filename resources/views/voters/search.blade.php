    @extends('voters.layout')
    @section('content')
    <div class="container">
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
        <form action="{{ route('search') }}" method="GET">
            <Label>Email:</Label>
            <input type="text" name="keyword" placeholder="Enter your Email" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Search</button>
            @if (isset($status))
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $status }}
                </div>
            @endif
            @if (is_null('status'))
        <!-- Display nothing if no search has been performed -->
            @endif
        </form>
        </div>
    </div>
    </div> 
    @endsection
    
