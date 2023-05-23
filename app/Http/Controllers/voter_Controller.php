<?php

namespace App\Http\Controllers;
use App\Models\voter;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class voter_Controller extends Controller
{
    public function index()
    {
        $voters = voter::all();
        
      return view ('voters.index')->with('voters', $voters);
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
        return redirect('voter')->with('status', 'voter Addedd!');  
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
        return redirect('voter')->with('flash_message', 'Contact deleted!');  
    }




    public function vote(Request $request)
    {
        $errors = [];
        $voters = voter::all();

        $candidate1 = intval($request->candidateOne);
        $candidate2 = intval($request->candidateTwo);


        if(empty($candidate1)) {
            $errors["candidateOne"]   = "Select a candidate.";
        }
        if(empty($candidate2)) {
            $errors["candidateTwo"]   = "Select a candidate.";
        }
        if(!empty($candidate2) && ($candidate1 === $candidate2)) {
            $errors["candidateTwo"]   = "You can not vote for same candidate.";
        }

        if(!empty($errors)) {
            return response()->json([
                'message' => 'Fix the errors and try again.',
                'errors' => $errors,
            ], 422);
        }

        try {
            $vote1  = Vote::updateOrCreate(
                [
                    'voters_id'  => 4,
                    'preference'  => 1,
                ],
                ['candidates_id' => $candidate1]
            );

            $vote2  = Vote::updateOrCreate(
                [
                    'voters_id'  => 4,
                    'preference'  => 2,
                ],
                ['candidates_id' => $candidate2]
            );
            return view('dashboard')->with('success','You have cast your vote successfully.')->with('voters',$voters);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to process your request.',
                'error' => $e->getMessage(),
            ]);
        }
        return view('voters.show');
    }




    public function poll_result()
    {
        $candidatesQ = Candidate::selectRaw('candidates.candidate_name, count(votes.candidate_id) as votes')
            ->leftJoin('votes', 'candidates.candidate_id', '=', 'votes.candidate_id')
            ->groupBy('candidates.candidate_name')
            ->orderBy('votes', 'desc');

        $candidates = $candidatesQ->get();
        $winners    = $candidatesQ->limit(2)->get();

        return view('poll-result', compact('candidates', 'winners'));
    }


}


