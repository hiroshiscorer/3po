<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\matchup;
use App\Models\pilot;
use App\Models\pilotStat;
use App\Models\team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchups = matchup::orderby('division_id')->orderby('round')->get();
        $pilots = pilot::all();
        return view('admin.report', compact('matchups', 'pilots'));
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
        if (matchup::where('id', $request->matchup_id)->count() == 0) {
            return redirect('admin-report')->with([
                'message' => 'data-error'
            ]);
        }
        foreach ($request->one_pilot_id as $check) {
            if ($check != null) {
                if (pilot::where('id', $check)->count() == 0) {
                    return redirect('admin-report')->with([
                        'message' => 'data-error'
                    ]);
                }
            }
        }
        foreach ($request->two_pilot_id as $check) {
            if ($check != null) {
                if (pilot::where('id', $check)->count() == 0) {
                    return redirect('admin-report')->with([
                        'message' => 'data-error'
                    ]);
                }
            }
        }
        $matchup = matchup::where('id', $request->matchup_id)->first();
        $team1 = team::where('id', $matchup->team1_id)->first();
        $team2 = team::where('id', $matchup->team2_id)->first();
        $match_round = $team1->team_name . ' vs ' . $team2->team_name;

        $game = new game();
        $game->match_round = $match_round.' 1';
        $game->matchup_id = $request->matchup_id;
        $game->game = "1";
        $game->map = $request->map_1;
        $game->faction = $request->faction_1;
        $game->save();
        $game_id = $game->id;

        for ($i = 0; $i < count($request->one_pilot_id); $i ++) {
            if ($request->one_pilot_id[$i] != null) {
                $pilot_stat = new pilotStat();
                $pilot_stat->pilot_id = $request->one_pilot_id[$i] ?? 0;
                $pilot_stat->score = $request->one_score[$i] ?? 0;
                $pilot_stat->kills = $request->one_kills[$i] ?? 0;
                $pilot_stat->deaths = $request->one_deaths[$i] ?? 0;
                $pilot_stat->assists = $request->one_assists[$i] ?? 0;
                $pilot_stat->ai_kills = $request->one_ai[$i] ?? 0;
                $pilot_stat->cap_damage = $request->one_cap[$i] ?? 0;
                $pilot_stat->match_id = $game_id;
                $pilot_stat->match_won = 0;
                $pilot_stat->match_lost = 0;
                $pilot_stat->match_tied = 0;
                if ($team1->id == pilot::where('id', $request->one_pilot_id[$i])->first()->team_id) {
                    // Current pilot is team 1
                    if ($request->winner_1 == 'team1') {
                        // Current pilot won
                        $pilot_stat->match_won = 1;
                    } else {
                        // Current pilot lost
                        $pilot_stat->match_lost = 1;
                    }
                } else {
                    // Current pilot is team 2
                    if ($request->winner_1 == 'team2') {
                        // Current pilot won
                        $pilot_stat->match_won = 1;
                    } else {
                        // Current pilot lost
                        $pilot_stat->match_lost = 1;
                    }
                }
                if ($request->winner_1 == 'tie') {
                    $pilot_stat->match_tied = 1;
                }
                $pilot_stat->save();
            }
        }

        $game = new game();
        $game->match_round = $match_round.' 2';
        $game->matchup_id = $request->matchup_id;
        $game->game = "2";
        $game->map = $request->map_2;
        $game->faction = $request->faction_2;
        $game->save();
        $game_id = $game->id;

        for ($i = 0; $i < count($request->two_pilot_id); $i ++) {
            if ($request->two_pilot_id[$i] != null) {
                $pilot_stat = new pilotStat();
                $pilot_stat->pilot_id = $request->two_pilot_id[$i] ?? 0;
                $pilot_stat->score = $request->two_score[$i] ?? 0;
                $pilot_stat->kills = $request->two_kills[$i] ?? 0;
                $pilot_stat->deaths = $request->two_deaths[$i] ?? 0;
                $pilot_stat->assists = $request->two_assists[$i] ?? 0;
                $pilot_stat->ai_kills = $request->two_ai[$i] ?? 0;
                $pilot_stat->cap_damage = $request->two_cap[$i] ?? 0;
                $pilot_stat->match_id = $game_id;
                $pilot_stat->match_won = 0;
                $pilot_stat->match_lost = 0;
                $pilot_stat->match_tied = 0;
                if ($team1->id == pilot::where('id', $request->two_pilot_id[$i])->first()->team_id) {
                    // Current pilot is team 1
                    if ($request->winner_1 == 'team1') {
                        // Current pilot won
                        $pilot_stat->match_won = 1;
                    } else {
                        // Current pilot lost
                        $pilot_stat->match_lost = 1;
                    }
                } else {
                    // Current pilot is team 2
                    if ($request->winner_1 == 'team2') {
                        // Current pilot won
                        $pilot_stat->match_won = 1;
                    } else {
                        // Current pilot lost
                        $pilot_stat->match_lost = 1;
                    }
                }
                if ($request->winner_1 == 'tie') {
                    $pilot_stat->match_tied = 1;
                }
                $pilot_stat->save();


            }
        }
        return redirect('admin-report')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\game  $match
     * @return \Illuminate\Http\Response
     */
    public function show(game $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\game  $match
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $matchups = matchup::orderby('division_id')->orderby('round')->get();
        $games = game::all();
        return view('admin.game', compact('games', 'matchups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\game  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $game = game::where('id', $request->id)->first();
        $game->match_round = $request->match_round;
        $game->matchup_id = $request->matchup_id;
        $game->game = $request->game;
        $game->map = $request->map;
        $game->faction = $request->faction;
        $game->save();
        return redirect('admin-game-edit')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\game  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $game = game::find($request->id);
        try {
            $game->delete();
        } catch(QueryException $e) {
            return redirect('admin-game-edit')->with([
                'message' => 'error'
            ]);
        }
        return redirect('admin-game-edit')->with([
            'message' => 'delete'
        ]);
    }

    public function clear()
    {
        try {
            $deleted = game::query()->delete();
        } catch(QueryException $e) {
            return redirect('admin-game-edit')->with([
                'message' => 'errors'
            ]);
        }
        return redirect('admin-game-edit')->with([
            'message' => 'clear'
        ]);

    }
}
