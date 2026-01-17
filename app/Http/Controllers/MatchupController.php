<?php

namespace App\Http\Controllers;

use App\Models\matchup;
use App\Models\team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $teams = team::all();
        $matchups = matchup::orderby('division_id')->orderby('round')->get();
        return view('admin.matchups', compact('teams', 'matchups'));
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
        $team1 = team::where('id', $request->team1_id)->first();
        $team2 = team::where('id', $request->team2_id)->first();
        if ($team1 == null || $team2 == null) {
            return redirect('admin-matchup')->with([
                'message' => "data-error"
            ]);
        }
        if ($request->team1_id == $request->team2_id) {
            return redirect('admin-matchup')->with([
                'message' => "double-error"
            ]);
        }

        if ($team1->division_id != $team2->division_id) {
            return redirect('admin-matchup')->with([
                'message' => "division-error"
            ]);
        }

        $matchup = new matchup();
        $matchup->team1_id = $request->team1_id;
        $matchup->team2_id = $request->team2_id;
        $matchup->team1_score = '0';
        $matchup->team2_score = '0';
        $matchup->round = $request->round;
        $matchup->division_id = $team1->division_id;
        $matchup->calendar = "";
        $matchup->bracket = "";
        $matchup->save();
        return redirect('admin-matchup')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matchup  $matchup
     * @return \Illuminate\Http\Response
     */
    public function show(matchup $matchup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matchup  $matchup
     * @return \Illuminate\Http\Response
     */
    public function edit(matchup $matchup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matchup  $matchup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $team1 = team::where('id', $request->team1_id)->first();
        $team2 = team::where('id', $request->team2_id)->first();
        $matchup = matchup::find($request->id);
        if ($team1 == null || $team2 == null) {
            return redirect('admin-matchup')->with([
                'message' => "data-error"
            ]);
        }
        if ($matchup == null) {
            return redirect('admin-matchup')->with([
                'message' => "data-error"
            ]);
        }
        if ($request->team1_id == $request->team2_id) {
            return redirect('admin-matchup')->with([
                'message' => "double-error"
            ]);
        }

        if ($team1->division_id != $team2->division_id) {
            return redirect('admin-matchup')->with([
                'message' => "division-error"
            ]);
        }

        $matchup->team1_id = $request->team1_id;
        $matchup->team2_id = $request->team2_id;
        $matchup->team1_score = $request->team1_score;
        $matchup->team2_score = $request->team2_score;
        $matchup->round = $request->round;
        $matchup->division_id = $team1->division_id;
        if ($request->date == null) {
            $date = '';
        } elseif ($request->time == null) {
            $date = $request->date;
        } else {
            $date = $request->date . ', ' . $request->time.' UTC.';
        }
        $matchup->calendar = $date;
        $matchup->bracket = $request->bracket ?? '';
        $matchup->save();
        return redirect('admin-matchup')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matchup  $matchup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $matchup = matchup::find($request->id);
        try {
            $matchup->delete();
        } catch(QueryException $e) {
            return redirect('admin-matchup')->with([
                'message' => 'error'
            ]);
        }
        return redirect('admin-matchup')->with([
            'message' => 'delete'
        ]);
    }

    public function clear()
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $deleted = matchup::query()->delete();
        return redirect('admin-matchup')->with([
            'message' => 'clear'
        ]);
    }
}
