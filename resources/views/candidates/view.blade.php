@extends('candidates.layout')
@section('content')


<div class="container">
        <div class="row">
 
            <div class="col-md-19">
                <div class="card">
                    <div class="card-header">Searched Candidate </div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/voter/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ route('search') }}" class="btn btn-success btn-sm" title="Search">
    <i class="fa fa-search" aria-hidden="true"></i> Search
</a> -->
                        <!-- <br/> -->
                        <!-- <br/>  -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Candidate Name</th>
                                        <th>CNIC </th>
                                        <th>Party Name</th>
                                        <th>Electoral</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td>{{ $candidates->id }}</td>
                                        <td>{{ $candidates->candidate_name }}</td>
                                        <td>{{ $candidates->CNIC }}</td>
                                        <td>{{ $candidates->party_name }}</td>
                                        <td>{{ $candidates->Electoral }}</td>
                                        <td><img src="{{ asset('uploads/candidate/'.$candidates->image) }}" width="70px"></td>
 
                                        <td>
                                            <!-- <a href="{{ url('/voter/' . $candidates->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/candidate/' . $candidates->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/candidate' . '/' . $candidates->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection