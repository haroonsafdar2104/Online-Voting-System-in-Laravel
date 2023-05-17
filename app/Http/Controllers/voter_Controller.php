<?php
namespace App\Http\Controllers;
use App\Models\voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class voter_Controller extends Controller
{
    public function index()
    {
        $voters = voter::all();
      return view ('voters.index')->with('voters', $voters);
    }
 
    
    public function create()
    {
        return view('voters.create');
    }
 
  
    public function store(Request $request)
    {
        
        $voter = new Voter();
        $voter->candidate_name = $request->input('candidate_name');
        $voter->CNIC = $request->input('CNIC');
        $voter->party_name = $request->input('party_name');
        $voter->Electoral = $request->input('Electoral');
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public');
        //     $imageName = basename($imagePath);
        // } else {
        //     $imageName = null;
        // }
        // $voter->image = $imageName;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/voter/', $filename);
            $voter->image = $filename;
        }
        $voter->save();

        return redirect('voter')->with('flash_message', 'Voter Added!');
    }
 
    
    public function show($id)
    {
        $voter = voter::find($id);
        return view('voters.show')->with('voters', $voter);
    }
 
    
    public function edit($id)
    {
        $voter = voter::find($id);
        return view('voters.edit')->with('voters', $voter);
    }
 
  
    public function update(Request $request, $id)
    {
        $voter = voter::find($id);
        $voter->candidate_name = $request->input('candidate_name');
        $voter->CNIC = $request->input('CNIC');
        $voter->party_name = $request->input('party_name');
        $voter->Electoral = $request->input('Electoral');

        // $input = $request->all();

        if($request->hasfile('image'))
        {
           $destination='uploads/voter/'.$voter->image;
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/voter/', $filename);
            $voter->image = $filename;
        }
        $voter->save();

        // $voter->update($input);
        return redirect('voter')->with('flash_message', 'Candidate Updated!');  
    }
 
  
    public function destroy($id)
    {
        voter::destroy($id);
        return redirect('voter')->with('flash_message', 'Candidate deleted!');  
    }

    public function search(Request $request)
    {
        $searchKeyword = $request->input('keyword');
        
        $results = DB::table('voters')
                   ->where('CNIC', $searchKeyword)  
                   ->get();
                   
        
        if ($results->count() == 1 && $results[0]->CNIC == $searchKeyword) {
            return view('voters.view', ['voters' => $results[0]]);
        } 
        else {
        
        return view('voters.search', ['results' => $results]);
    }

}
}