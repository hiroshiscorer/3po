<?php

namespace App\Http\Controllers;

use App\Models\division;
use App\Models\team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = team::all();
        $divisions = division::all();
        return view('admin.team', compact('teams', 'divisions'));
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
        $team = new team();
        $team->team_name = $request->team_name;
        $team->initials = $request->initials ?? '';
        $team->logo = $request->logo ?? '';
        $team->club = $request->club ?? '';
        if (division::where('id', $request->division_id)->count() == 0) {
            return redirect('admin-team')->with([
                'message' => 'data-error'
            ]);
        }
        $team->division_id = $request->division_id;
        $team->save();

        return redirect('admin-team')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $team = team::find($request->id);
        $team->team_name = $request->team_name;
        $team->initials = $request->initials ?? '';
        $team->club = $request->club ?? '';
        $team->logo = $request->logo ?? '';
        if (division::where('id', $request->division_id)->count() == 0) {
            return redirect('admin-team')->with([
                'message' => 'data-error'
            ]);
        }
        $team->division_id = $request->division_id;
        $team->save();

        return redirect('admin-team')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $team = team::find($request->id);
        try {
            $team->delete();
        } catch(QueryException $e) {
            return redirect('admin-team')->with([
                'message' => 'error'
            ]);
        }
        return redirect('admin-team')->with([
            'message' => 'delete'
        ]);
    }

    public function clear()
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $deleted = team::query()->delete();
        return redirect('admin-team')->with([
            'message' => 'clear'
        ]);
    }


}
