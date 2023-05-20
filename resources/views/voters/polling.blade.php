
@extends('candidates.layout')
@section('content')

<section class="section py-5 bg-light">
    <div class="container">
        <div class="card">
            <div class="text-center py-4">
                <h1 class="fw-light">Vote For Your Preferred Candidate</h1>
                <p class="lead text-muted">You can vote for 2 candidates.</p>
            </div>

           

            <div class="card-body pt-5">
                <form id="voting_form">
                    <div class="form-group mb-2">
                        <label for="mobile">Your Mobile No.</label>
                        <input type="number" name="mobile" id="mobile" class="form-control">
                        <p id="mobile_msg" class="input-status-msg"></p>
                    </div>

                    <div class="row mt-3 candidateList-wrapper">
                        <div class="col-md-6">
                            <p class="fs-5">1st Candidate</p>
                            <div id="candidateOne" class="candidateList">
                                @foreach ($candidates as $candidate)
                                    @php
                                        $candidateId    = $candidate->candidate_id;
                                        $candidateName  = $candidate->candidate_name;
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="candidateOne" value="{{ $candidateId }}" id="candidateOne_{{ $candidateId }}">
                                        <label class="form-check-label" for="candidateOne_{{ $candidateId }}">
                                            {{ $candidateName }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <p id="candidateOne_msg" class="input-status-msg"></p>
                        </div>
                        <div class="col-md-6">
                            <p class="fs-5">2nd Candidate</p>
                            <div id="candidateTwo" class="candidateList">
                                @foreach ($candidates as $candidate)
                                    @php
                                        $candidateId    = $candidate->candidate_id;
                                        $candidateName  = $candidate->candidate_name;
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="candidateTwo" value="{{ $candidateId }}" id="candidateTwo_{{ $candidateId }}">
                                        <label class="form-check-label" for="candidateTwo_{{ $candidateId }}">
                                            {{ $candidateName }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <p id="candidateTwo_msg" class="input-status-msg"></p>
                        </div>
                    </div>

                    @csrf
                    <div id="voting_form_status" class="my-3" style="max-width:600px;"></div>
                    <button type="button" id="voting_form_submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection