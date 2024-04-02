<?php

namespace App\Http\Controllers;

use App\Models\archive;
use App\Models\card;
use App\Models\division;
use App\Models\game;
use App\Models\matchup;
use App\Models\pilot;
use App\Models\pilotStat;
use App\Models\season;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Cache::flush();

        $season = season::orderByDesc('created_at')->first();
        $division = $season != '' ? division::where('season_id', $season->id)->get() : '';

        $standings1 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team1_score) score_one, logo, teams.division_id, penalty'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team1_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        $standings2 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team2_score) score_two, logo'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team2_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        return view('home', compact('season', 'division', 'standings1', 'standings2'));
    }

    public function teams()
    {
        $season = season::orderByDesc('created_at')->first();
        $division = $season != '' ? division::where('season_id', $season->id)->get() : '';

        return view('teams', compact('season', 'division'));
    }

    public function pilots()
    {
        $divisions = division::all();
        $season = season::orderByDesc('created_at')->first();
        $pilots = DB::table('pilots')
            ->join('teams', 'pilots.team_id', '=', 'teams.id')
            ->join('divisions', 'teams.division_id', '=', 'divisions.id')
            ->select('pilots.*', 'teams.team_name', 'teams.initials', 'divisions.division_name')
            ->orderBy('teams.id')
            ->orderBy('pilots.pilot_name')
            ->get();


        return view('pilots', compact('season', 'pilots', 'divisions') );
    }

    public function schedule()
    {
        $season = season::orderByDesc('created_at')->first();
        $divisions = $season != '' ? division::where('season_id', $season->id)->get() : '';

        $allTeams = team::all();

        return view('schedule', compact('season', 'divisions', 'allTeams') );
    }

    public function backdoor()
    {
        return view('backdoor');
    }
    public function rules()
    {
        return view('rules');
    }
    public function seasons()
    {
        $archives = archive::all();
        return view('seasons', compact('archives'));
    }
    public function archive($id)
    {
        $archive = archive::where('id', $id)->first();
        return view('archive', compact('archive'));
    }
    public function pilotcard($pilotname)
    {
        $pilot = pilot::where('pilot_name', $pilotname)->first();
        $team = team::where('id', $pilot->team_id)->first();
        $stats = pilotStat::where('pilot_id', $pilot->id)->get();
        $nrStat = ['kills' => 0, 'deaths' => 0, 'assists' => 0, 'wins' => 0, 'cap' => 0, 'ai' => 0];
        $eStat = ['kills' => 0, 'deaths' => 0, 'assists' => 0, 'wins' => 0, 'cap' => 0, 'ai' => 0];

        for ($i = 0; $i < count($stats); $i++) {
            $match = \App\Models\game::where('id', $stats[$i]->match_id)->first();

            $matchup = matchup::where('id', $match->matchup_id)->first();
            if ($pilot->team_id == $matchup->team1_id) {
                if ($match->faction == 0) {
                    //add to NR stats
                    $nrStat["kills"]+=$stats[$i]->kills;
                    $nrStat["deaths"]+=$stats[$i]->deaths;
                    $nrStat["assists"]+=$stats[$i]->assists;
                    $nrStat["wins"]+=$stats[$i]->match_won;
                    $nrStat["ai"]+=$stats[$i]->ai_kills;
                    $nrStat["cap"]+=$stats[$i]->cap_damage;
                } else {
                    //add to emp stats
                    $eStat["kills"]+=$stats[$i]->kills;
                    $eStat["deaths"]+=$stats[$i]->deaths;
                    $eStat["assists"]+=$stats[$i]->assists;
                    $eStat["wins"]+=$stats[$i]->match_won;
                    $eStat["ai"]+=$stats[$i]->ai_kills;
                    $eStat["cap"]+=$stats[$i]->cap_damage;
                }
            }
            if ($pilot->team_id == $matchup->team2_id) {
                if ($match->faction == 1) {
                    //add to NR stats
                    $nrStat["kills"]+=$stats[$i]->kills;
                    $nrStat["deaths"]+=$stats[$i]->deaths;
                    $nrStat["assists"]+=$stats[$i]->assists;
                    $nrStat["wins"]+=$stats[$i]->match_won;
                    $nrStat["ai"]+=$stats[$i]->ai_kills;
                    $nrStat["cap"]+=$stats[$i]->cap_damage;
                } else {
                    //add to emp stats
                    $eStat["kills"]+=$stats[$i]->kills;
                    $eStat["deaths"]+=$stats[$i]->deaths;
                    $eStat["assists"]+=$stats[$i]->assists;
                    $eStat["wins"]+=$stats[$i]->match_won;
                    $eStat["ai"]+=$stats[$i]->ai_kills;
                    $eStat["cap"]+=$stats[$i]->cap_damage;
                }
            }

        }

        return view('pilotcard', compact('pilot', 'team', 'stats', 'nrStat', 'eStat'));
    }

    public function archivecard($season, $pilotname)
    {
        $card = card::where('season', $season)->where('pilotname', $pilotname)->first();
        return view('archivecard', compact('card'));
    }

    public function allcard()
    {
        $pilots = pilot::all();
        $all = [];
        foreach ($pilots as $pilot) {

            $team = team::where('id', $pilot->team_id)->first();
            $stats = pilotStat::where('pilot_id', $pilot->id)->get();
            $nrStat = ['kills' => 0, 'deaths' => 0, 'assists' => 0, 'wins' => 0, 'cap' => 0, 'ai' => 0];
            $eStat = ['kills' => 0, 'deaths' => 0, 'assists' => 0, 'wins' => 0, 'cap' => 0, 'ai' => 0];


            for ($i = 0; $i < count($stats); $i++) {
                $match = \App\Models\game::where('id', $stats[$i]->match_id)->first();

                $matchup = matchup::where('id', $match->matchup_id)->first();
                if ($pilot->team_id == $matchup->team1_id) {
                    if ($match->faction == 0) {
                        //add to NR stats
                        $nrStat["kills"] += $stats[$i]->kills;
                        $nrStat["deaths"] += $stats[$i]->deaths;
                        $nrStat["assists"] += $stats[$i]->assists;
                        $nrStat["wins"] += $stats[$i]->match_won;
                        $nrStat["ai"] += $stats[$i]->ai_kills;
                        $nrStat["cap"] += $stats[$i]->cap_damage;
                    } else {
                        //add to emp stats
                        $eStat["kills"] += $stats[$i]->kills;
                        $eStat["deaths"] += $stats[$i]->deaths;
                        $eStat["assists"] += $stats[$i]->assists;
                        $eStat["wins"] += $stats[$i]->match_won;
                        $eStat["ai"] += $stats[$i]->ai_kills;
                        $eStat["cap"] += $stats[$i]->cap_damage;
                    }
                }
                if ($pilot->team_id == $matchup->team2_id) {
                    if ($match->faction == 1) {
                        //add to NR stats
                        $nrStat["kills"] += $stats[$i]->kills;
                        $nrStat["deaths"] += $stats[$i]->deaths;
                        $nrStat["assists"] += $stats[$i]->assists;
                        $nrStat["wins"] += $stats[$i]->match_won;
                        $nrStat["ai"] += $stats[$i]->ai_kills;
                        $nrStat["cap"] += $stats[$i]->cap_damage;
                    } else {
                        //add to emp stats
                        $eStat["kills"] += $stats[$i]->kills;
                        $eStat["deaths"] += $stats[$i]->deaths;
                        $eStat["assists"] += $stats[$i]->assists;
                        $eStat["wins"] += $stats[$i]->match_won;
                        $eStat["ai"] += $stats[$i]->ai_kills;
                        $eStat["cap"] += $stats[$i]->cap_damage;
                    }
                }

            }
            $c1 =  "INSERT INTO `cards` (`id`,`season`,`pilotname`,`team`,`team_image`,`nr_k`,`nr_d`,`nr_a`,`nr_w`,`nr_kd`,`nr_ai`,`nr_cap`,`ge_k`,`ge_d`,`ge_a`,`ge_w`,`ge_kd`,`ge_ai`,`ge_cap`,`t_kd`,`created_at`,`updated_at`) VALUES (NULL,'proto-0','" . $pilot->pilot_name ."','". $team->team_name ."','" . ($team->logo != '' ? $team->logo : 'default.png')."','". $nrStat['kills'] ."','". $nrStat['deaths'] ."','". $nrStat['assists'] ."','". $nrStat['wins'] ."','". number_format($nrStat['kills'] / ($nrStat['deaths'] != 0 ? $nrStat['deaths'] : 1), 2) ."','". $nrStat['ai'] ."','". $nrStat['cap'] ."','". $eStat['kills'] ."','". $eStat['deaths'] ."','". $eStat['assists'] ."','". $eStat['wins'] ."','". number_format($eStat['kills'] / ($eStat['deaths'] != 0 ? $eStat['deaths'] : 1), 2) ."','". $eStat['ai'] ."','". $eStat['cap'] ."','". number_format(($nrStat['kills'] + $eStat['kills']) / (($nrStat['deaths'] + $eStat['deaths']) != 0 ? ($nrStat['deaths'] + $eStat['deaths']) : 1), 2) ."',NULL,NULL); ";
            // add to array
            // $all[] = $constructed;
            array_push($all, $c1);

        }
        return view('get-sql', compact('all'));
    }

    public function getarchive()
    {
        $season = season::orderByDesc('created_at')->first();
        $divisions = division::where('season_id', $season->id)->get();
        $allTeams = team::all();
        $pilots = DB::table('pilots')
            ->join('teams', 'pilots.team_id', '=', 'teams.id')
            ->join('divisions', 'teams.division_id', '=', 'divisions.id')
            ->select('pilots.*', 'teams.team_name', 'teams.initials', 'divisions.division_name')
            ->orderBy('teams.id')
            ->orderBy('pilots.pilot_name')
            ->get();

        $standings1 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team1_score) score_one, logo, teams.division_id, penalty'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team1_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        $standings2 = DB::table('teams')
            ->select(DB::raw('teams.id, team_name, SUM(team2_score) score_two, logo'))
            ->leftJoin('matchups', 'teams.id', '=', 'matchups.team2_id')
            ->groupBy('id')
            ->orderBy('id')
            ->get();

        return view('get-archive', compact('season', 'divisions', 'allTeams', 'pilots', 'standings1', 'standings2'));
    }
}


