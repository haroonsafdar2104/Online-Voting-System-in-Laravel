<?php

namespace App\Http\Controllers;
use App\Models\voter;
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
 
  
    public function destroy($id)
    {
        voter::destroy($id);
        return redirect('voter')->with('flash_message', 'Contact deleted!');  
    }
}


