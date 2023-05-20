@extends('voters.layout')
@section('content')
 
<div class="container">
<div class="card">
  <div class="card-header">Details of {{$voters->name}}</div>
  <div class="card-body">
        <table class="table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $voters->id }}</td>
                                        <td>{{ $voters->name }}</td>
                                        <td>{{ $voters->email }}</td>
                                        <td>{{ $voters->password }}</td>
 
                                        <td>
                                            <a href="{{ url('/voter/' . $voters->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/voter' . '/' . $voters->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('voter') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back</button></a>
                            <a href="" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cast Vote</button></a>
  </div>
    </hr>
  
  </div>
</div>
</div>
@endsection