<?php

namespace App\Http\Controllers;

use App\Models\pilot;
use App\Models\team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PilotController extends Controller
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
        $teams2 = team::all();
        $pilots = pilot::all();
        return view('admin.pilot', compact('teams', 'teams2', 'pilots'));
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
        $pilot_list = explode(PHP_EOL, $request->pilot_name);
        $message = 'add';
        $no_dupes = array_unique($pilot_list);
        if (count($pilot_list) != count($no_dupes)) {
            $message = 'duplicate-warning';
        }
        foreach ($no_dupes as $pilot_name) {
            if (pilot::where('pilot_name', $pilot_name)->count() ) {
                $message = 'duplicate-warning';
            } else {
                $pilot = new pilot();
                $pilot->pilot_name = $pilot_name;
                $pilot->team_id = $request->team_id;
                $pilot->save();
            }
        }
        return redirect('admin-pilot')->with([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function show(pilot $pilot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function edit(pilot $pilot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $pilot = pilot::find($request->id);
        $pilot->pilot_name = $request->pilot_name;
        if (team::where('id', $request->team_id)->count() == 0) {
            return redirect('admin-pilot')->with([
                'message' => 'data-error'
            ]);
        }
        $pilot->team_id = $request->team_id;
        $pilot->save();

        return redirect('admin-pilot')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $pilot = pilot::find($request->id);
        try {
            $pilot->delete();
        } catch(QueryException $e) {
            return redirect('admin-pilot')->with([
                'message' => 'error'
            ]);
        }
        return redirect('admin-pilot')->with([
            'message' => 'delete'
        ]);
    }

    public function clear()
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $deleted = pilot::query()->delete();
        return redirect('admin-pilot')->with([
            'message' => 'clear'
        ]);
    }

    public function clearteam(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $deleted = pilot::where('team_id', $request->id)->delete();
        return redirect('admin-pilot')->with([
            'message' => 'clear'
        ]);
    }
}
