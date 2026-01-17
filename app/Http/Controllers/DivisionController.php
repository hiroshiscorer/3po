<?php

namespace App\Http\Controllers;

use App\Models\division;
use App\Models\season;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $season = season::first();
        $divisions = division::all();
        return view('admin.division', compact('season', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }

        $division = new division();
        $division->division_name = $request->division_name;
        if (season::where('id', $request->season_id)->count() == 0) {
            return redirect('admin-division')->with([
                'message' => 'data-error'
            ]);
        }
        $division->season_id = $request->season_id;
        $division->rounds = $request->rounds;
        $division->save();
        return redirect('admin-division')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $division = division::find($request->id);
        $division->division_name = $request->division_name;
        if (season::where('id', $request->season_id)->count() == 0) {
            return redirect('admin-division')->with([
                'message' => 'data-error'
            ]);
        }
        $division->season_id = $request->season_id;
        $division->rounds = $request->rounds;
        $division->save();
        return redirect('admin-division')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $division = division::find($request->id);
        try {
            $division->delete();
        } catch(QueryException $e) {
            return redirect('admin-division')->with([
                'message' => 'error'
            ]);
        }
        return redirect('admin-division')->with([
            'message' => 'delete'
        ]);
    }
}
