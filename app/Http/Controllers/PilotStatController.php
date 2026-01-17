<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\pilot;
use App\Models\pilotStat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PilotStatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = pilotStat::all();
        $pilots = pilot::orderby('pilot_name')->get();
        $games = game::orderby('matchup_id')->get();
        return view('admin.pilot-stats', compact('stats', 'pilots', 'games'));
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
        $pilot_id = pilot::where('id', $request->pilot_id)->first()->count();
        $match_id = game::where('id', $request->game_id)->first()->count();
        if ($pilot_id == 0 || $match_id == 0) {
            return redirect('admin-pilot-stats')->with([
                'message' => 'data-error'
            ]);
        }
        $stat = new pilotStat();
        $stat->pilot_id = $request->pilot_id ?? 0;
        $stat->score = $request->score ?? 0;
        $stat->kills = $request->kills ?? 0;
        $stat->deaths = $request->deaths ?? 0;
        $stat->assists = $request->assists ?? 0;
        $stat->ai_kills = $request->ai ?? 0;
        $stat->cap_damage = $request->cap ?? 0;
        $stat->match_id = $request->game_id;
        $stat->match_won = 0;
        $stat->match_tied = 0;
        $stat->match_lost = 0;
        switch ($request->winstate) {
            case "win":
                $stat->match_won = 1;
                break;
            case "draw":
                $stat->match_tied = 1;
                break;
            case "lose":
                $stat->match_lost = 1;
                break;
            default:
                return redirect('admin-pilot-stats')->with([
                    'message' => 'data-error'
                ]);
        }
       $stat->save();
        return redirect('admin-pilot-stats')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilotStat  $pilotStat
     * @return \Illuminate\Http\Response
     */
    public function show(pilotStat $pilotStat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilotStat  $pilotStat
     * @return \Illuminate\Http\Response
     */
    public function edit(pilotStat $pilotStat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pilotStat  $pilotStat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $pilot_id = pilot::where('id', $request->pilot_id)->first()->count();
        $match_id = game::where('id', $request->game_id)->first()->count();
        if ($pilot_id == 0 || $match_id == 0) {
            return redirect('admin-pilot-stats')->with([
                'message' => 'data-error'
            ]);
        }
        $stat = pilotStat::where('id', $request->id)->first();
        if ($stat->count() == 0) {
            return redirect('admin-pilot-stats')->with([
                'message' => 'data-error'
            ]);
        }
        $stat->pilot_id = $request->pilot_id ?? 0;
        $stat->score = $request->score ?? 0;
        $stat->kills = $request->kills ?? 0;
        $stat->deaths = $request->deaths ?? 0;
        $stat->assists = $request->assists ?? 0;
        $stat->ai_kills = $request->ai ?? 0;
        $stat->cap_damage = $request->cap ?? 0;
        $stat->match_id = $request->game_id;
        $stat->match_won = 0;
        $stat->match_tied = 0;
        $stat->match_lost = 0;
        switch ($request->winstate) {
            case "win":
                $stat->match_won = 1;
                break;
            case "draw":
                $stat->match_tied = 1;
                break;
            case "lose":
                $stat->match_lost = 1;
                break;
            default:
                return redirect('admin-pilot-stats')->with([
                    'message' => 'data-error'
                ]);
        }
        $stat->save();
        return redirect('admin-pilot-stats')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilotStat  $pilotStat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $stat = pilotStat::find($request->id);
        try {
            $stat->delete();
        } catch(QueryException $e) {
            return redirect('admin-pilot-stats')->with([
                'message' => 'data-error'
            ]);
        }
        return redirect('admin-pilot-stats')->with([
            'message' => 'delete'
        ]);
    }

    public function clear()
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $deleted = pilotStat::query()->delete();
        return redirect('admin-pilot-stats')->with([
            'message' => 'clear'
        ]);
    }
}
