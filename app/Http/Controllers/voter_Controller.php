<?php

namespace App\Http\Controllers;
use App\Models\voter;
use App\Models\Candidate;
use App\Models\candidate_support;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class voter_Controller extends Controller
{
    public function index()
    {
        $voters = voter::all();
        $supports = candidate_support::all();
        
      return view ('voters.index')->with('voters', $voters)->with('supports', $supports);
    }
    public function showVoters()
{
    $totalVoters = Voter::count();

    return view('Dashboard', ['totalVoters' => $totalVoters]);
}
    
    public function create()
    {
        return view('voters.create');
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        voter::create($input);
        return redirect('voter')->with('flash_message', 'voter Addedd!');  
    }
    public function show($name)
    {
        $voter = voter::find($name);
        return view('voters.view')->with('voters', $voter);
    }
public function search(Request $request)
{
    $searchKeyword = $request->input('keyword');
    
    $results = DB::table('voters')
               ->where('email', $searchKeyword)  
               ->get();
               
    // check if there is exactly one result with the same name
    if ($results->count() == 1 && $results[0]->email == $searchKeyword) {
        $status = null;
        return view('voters.show', ['voters' => $results[0]]);
        
    } else {
        return view('voters.search')->with('status', 'user not Found')->with('searchKeyword', $searchKeyword);
        
    }
}

public function csearch(Request $request)
{
    $searchKeyword = $request->input('keyword');
    
    $results = DB::table('candidates')
               ->where('CNIC', $searchKeyword)  
               ->get();
               
    // check if there is exactly one result with the same name
    if ($results->count() == 1 && $results[0]->CNIC == $searchKeyword) {
        $status = null;
        return view('candidates.show', ['candidates' => $results[0]]);
        
    } else {
        return view('candidates.search')->with('status', 'user not Found')->with('searchKeyword', $searchKeyword);
        
    }
}


    public function edit($id)
    {
        $voter = voter::find($id);
        return view('voters.edit')->with('voters', $voter);
    }
 
  
    public function update(Request $request, $id)
    {
        $voter = voter::find($id);
        $input = $request->all();
        $voter->update($input);
        return redirect('voter')->with('flash_message', 'Voter Updated!');  
    }
    public function showPollingPage()
    {
        $candidates = Candidate::all();
        return view('voters.polling')->with('candidates', $candidates);
    }
 
  
    public function destroy($id)
    {   

        voter::destroy($id);
        return redirect('voter')->with('flash_message', 'Voter deleted!');  
}
public function delete($id)
{   

    vote::destroy($id);
    $votes = vote::all();
    return view('voters.polling_result')->with('flash_message', 'Vote deleted!')->with('votes', $votes);  
}
    public function vote(Request $request)
{
    $errors = [];

    // Validate voter name
    $voterName = $request->input('voterName');
    $voter = Voter::where('name', $voterName)->first();
    if (!$voter) {
        $errors["voterName"] = "You are not a registered voter.";
    }
    if ($voter && $vote = Vote::where('voters_id', $voter->voters_id)->first()) {
        $errors["voterName"] = "You have already cast your vote.";
    }

    $candidate1 = intval($request->candidateOne);
    $candidate2 = intval($request->candidateTwo);

    if (empty($candidate1)) {
        $errors["candidateOne"] = "Select a candidate.";
    }

    if (empty($candidate2)) {
        $errors["candidateTwo"] = "Select a candidate.";
    }

    if (!empty($candidate2) && ($candidate1 === $candidate2)) {
        $errors["candidateTwo"] = "You cannot vote for the same candidate.";
    }

    if (!empty($errors)) {
        return back()->withErrors($errors)->withInput();
    }

    try {
        $vote1 = Vote::updateOrCreate(
            [
                'voters_id' => $voter->voters_id,
                'preference' => 1,
            ],
            ['candidates_id' => $candidate1]
        );

        $vote2 = Vote::updateOrCreate(
            [
                'voters_id' => $voter->voters_id,
                'preference' => 2,
            ],
            ['candidates_id' => $candidate2]
        );
        $candidatesQ = Candidate::selectRaw('candidates.candidate_name, count(votes.candidates_id) as votes')
            ->leftJoin('votes', 'candidates.candidates_id', '=', 'votes.candidates_id')
            ->groupBy('candidates.candidate_name')
            ->orderBy('votes', 'desc');

        $candidates = $candidatesQ->get();
        $winners    = $candidatesQ->limit(2)->get();
        $votes = vote::all();
        return view('dashboard')->with('success', 'You have cast your vote successfully.')->with('winners',$winners)->with('candidates',$candidates)->with('votes', $votes);
    } catch (Exception $e) {
        return back()->withErrors(['error' => 'Unable to process your request.'])->withInput();
    }
}





    public function poll_result()
    {
        $candidatesQ = Candidate::selectRaw('candidates.candidate_name, count(votes.candidate_id) as votes')
            ->leftJoin('votes', 'candidates.candidate_id', '=', 'votes.candidate_id')
            ->groupBy('candidates.candidate_name')
            ->orderBy('votes', 'desc');

        $candidates = $candidatesQ->get();
        $winners    = $candidatesQ->limit(2)->get();

        return view('dashboard', compact('candidates', 'winners'));
    }

    public function showsupport(){
        $candidates = candidate::all();
        $voters = voter::all();
        return view('voters.candidatesupport')->with('candidates',$candidates)->with('voters', $voters);
    }
    public function support(request $request){
        
        $voter = new candidate_support();
        $voter->voters_id = $request->input('voters_name');
        $voter->candidates_id = $request->input('candidates_name');
        $voter->description = $request->input('description');
        $voter->save();
        $candidates = candidate_support::all();
        return redirect('voter')->with('status', 'support added')->with('candidates',$candidates); 
    }
    public function polling_result(){
        $votes = vote::all();
        return view('voters.polling_result')->with('votes', $votes);
    }


}


