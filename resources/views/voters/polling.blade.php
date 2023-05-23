@extends('layout')
@section('content')

<section class="section py-5 bg-light">
    <div class="container">
        <div class="card">
            <div class="text-center py-4">
                <h1 class="fw-light">Vote For Your Preferred Candidate</h1>
                <p class="lead text-muted">You can vote for 2 candidates.</p>
            </div>

            <div class="card-body pt-5">
                <form id="voting_form" action="{{ route('vote') }}" method="post">
                    <div class="row mt-3 candidateList-wrapper">
                        <div class="col-md-6">
                            <p class="fs-5">1st Candidate</p>
                            <div id="candidateOne" class="candidateList">
                                @foreach ($candidates as $candidate)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="candidateOne" value="{{ $candidate->candidates_id }}" id="candidateOne_{{ $candidate->candidates_id }}">
                                        <label class="form-check-label" for="candidateOne_{{ $candidate->candidates_id }}">
                                            {{ $candidate->candidate_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('candidateOne')
                                <p class="input-status-msg">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <p class="fs-5">2nd Candidate</p>
                            <div id="candidateTwo" class="candidateList">
                                @foreach ($candidates as $candidate)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="candidateTwo" value="{{ $candidate->candidates_id }}" id="candidateTwo_{{ $candidate->candidates_id }}">
                                        <label class="form-check-label" for="candidateTwo_{{ $candidate->candidates_id }}">
                                            {{ $candidate->candidate_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('candidateTwo')
                                <p class="input-status-msg">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @csrf
                    <div id="voting_form_status" class="my-3" style="max-width:600px;"></div>
                    <button type="submit" id="voting_form_submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
