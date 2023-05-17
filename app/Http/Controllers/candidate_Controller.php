<?php
namespace App\Http\Controllers;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class candidate_Controller extends Controller
{
    public function index()
    {
        $candidate = candidate::all();
      return view ('candidates.index')->with('candidate', $candidate);
    }
 
    
    public function create()
    {
        return view('candidates.create');
    }
 
  
    public function store(Request $request)
    {
        
        $candidate = new candidate();
        $candidate->candidate_name = $request->input('candidate_name');
        $candidate->CNIC = $request->input('CNIC');
        $candidate->party_name = $request->input('party_name');
        $candidate->Electoral = $request->input('Electoral');
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public');
        //     $imageName = basename($imagePath);
        // } else {
        //     $imageName = null;
        // }
        // $candidate->image = $imageName;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/candidate/', $filename);
            $candidate->image = $filename;
        }
        $candidate->save();

        return redirect('candidate')->with('flash_message', 'candidate Added!');
    }
 
    
    public function show($id)
    {
        $candidate = candidate::find($id);
        return view('candidates.show')->with('candidate', $candidate);
    }
 
    
    public function edit($id)
    {
        $candidate = candidate::find($id);
        return view('candidates.edit')->with('candidate', $candidate);
    }
 
  
    public function update(Request $request, $id)
    {
        $candidate = candidate::find($id);
        $candidate->candidate_name = $request->input('candidate_name');
        $candidate->CNIC = $request->input('CNIC');
        $candidate->party_name = $request->input('party_name');
        $candidate->Electoral = $request->input('Electoral');

        // $input = $request->all();

        if($request->hasfile('image'))
        {
           $destination='uploads/candidate/'.$candidate->image;
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/candidate/', $filename);
            $candidate->image = $filename;
        }
        $candidate->save();

        // $candidate->update($input);
        return redirect('candidate')->with('flash_message', 'Candidate Updated!');  
    }
 
  
    public function destroy($id)
    {
        candidate::destroy($id);
        return redirect('candidate')->with('flash_message', 'Candidate deleted!');  
    }

    public function search(Request $request)
    {
        $searchKeyword = $request->input('keyword');
        
        $results = DB::table('candidates')
                   ->where('CNIC', $searchKeyword)  
                   ->get();
                   
        
        if ($results->count() == 1 && $results[0]->CNIC == $searchKeyword) {
            return view('candidates.view', ['candidates' => $results[0]]);
        } 
        else {
        
        return view('candidates.search', ['results' => $results]);
    }

}
}