<?php

namespace App\Http\Controllers;

use App\Models\season;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = season::all();
        return view('admin.season', compact('seasons'));
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
        $season = new season();
        $season->season_name = $request->season_name;
        $season->type = $request->type == 'tourney' ? 'tourney' : 'league';
        $season->rounds = 1;
        $season->show = 0;
        $season->save();

        return redirect('admin-season')->with([
            'message' => 'add'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $season = season::find($request->id);
        $season->season_name = $request->season_name;
        $season->type = $request->type == 'tourney' ? 'tourney' : 'league';
        $season->show = $request->show == '1' ? '1' : '0';
        $season->save();

        return redirect('admin-season')->with([
            'message' => 'edit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('home');
        }
        $season = season::find($request->id);
        try {
            $season->delete();
        } catch(QueryException $e) {
            return redirect('admin-season')->with([
            'message' => 'error'
        ]);
        }
        return redirect('admin-season')->with([
            'message' => 'delete'
        ]);
    }
}
