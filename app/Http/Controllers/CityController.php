<?php

namespace App\Http\Controllers;
use App\Models\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CityController extends Controller
{
    public function index()
    {
        $city = city::all();
      return view ('city.index')->with('city', $city);
    }
 
    
    public function create(Request $request)
    {
        $cities = city::all();
        return view('city.create')->with('cities', $cities);
    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        city::create($input);
        return redirect('city')->with('status', 'city Addedd!');  
    }
    public function show($name)
    {
        $city = city::find($name);
        return view('city.view')->with('city', $city);
    }
public function search(Request $request)
{
    $searchKeyword = $request->input('keyword');
    
    $results = DB::table('city')
               ->where('email', $searchKeyword)  
               ->get();
               
    // check if there is exactly one result with the same name
    if ($results->count() == 1 && $results[0]->email == $searchKeyword) {
        $status = null;
        return view('city.show', ['city' => $results[0]]);
        
    } else {
        return view('city.search')->with('status', 'user not Found')->with('searchKeyword', $searchKeyword);
        
    }
}
    public function edit($id)
    {
        $city = city::find($id);
        return view('city.edit')->with('city', $city);
    }
 
  
    public function update(Request $request, $id)
    {
        $city = city::find($id);
        $input = $request->all();
        $city->update($input);
        return redirect('city')->with('flash_message', 'Voter Updated!');  
    }
 
  
    public function destroy($id)
    {
        city::destroy($id);
        return redirect('city')->with('flash_message', 'Contact deleted!');  
    }
}


