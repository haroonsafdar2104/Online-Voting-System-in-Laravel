<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\candidate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $candidatesQ = Candidate::selectRaw('candidates.candidate_name, count(votes.candidates_id) as votes')
        ->leftJoin('votes', 'candidates.candidates_id', '=', 'votes.candidates_id')
        ->groupBy('candidates.candidate_name')
        ->orderBy('votes', 'asc');

    $candidates = $candidatesQ->get();
    $winners    = $candidatesQ->limit(2)->get();
        return view('home')->with('winners', $winners)->with('candidates', $candidates);
    }
}
