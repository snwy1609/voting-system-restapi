<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $positions = \App\Models\Position::with('candidates')->get();
     
       // return view('layouts.home',compact('positions'));
        return response()->json([
            "status" => 1,
            "data" => $positions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.add_position');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $position = $request->all();
        \App\Models\Position::create($position);
        return redirect('/candidate');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createCandidate(String $id){
        $position = \App\Models\Position::findOrFail($id);
        \Session::put('position_object',$position);
        \Session::save();
        return view('layouts.add_candidate',compact('position'));
    }

    public function storeCandidate(Request $request){ 

        $id = $request->position_id;
        $position =\Session::get('position_object');

        $name = $request->name;

        $candidate = new \App\Models\Candidate(['name'=>$name]);
        $position->candidates()->save($candidate);



        

        return redirect('/candidate');
      
    }
}
