@extends('layouts.app')

@section('content')
<main id="home">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mtop60 mbot60 text-center"><span>Welcome to</span> Star Cross Fighter League</h1>
                <p class="feature">SCFL brings the thrill of Competitive Dogfighting to the smaller arena. <br/>
                A league designed to fly in a 3v3 format, which makes this a fast paced, explosive and rewarding event.</p>

                <div class="row">
                    <div class="col-12">

                        <div class="home-card">
                        @if($division != '')
                            @if ($season->show === 1)
                                    <h2>Current Season<span>{{ $season->season_name }}</span></h2>


                                @switch($season->type)
                                    @case('league')
                                    <ul>
                                        <li>Type: League</li>
                                        <li>Divisions: {{ count($division) }}</li>
                                        <li>{!! $season->misc !!}</li>
                                    </ul>
                                    @break
                                    @case('tourney')
                                    <ul>
                                        <li>Type: Elimination</li>
                                        <li>{!! $season->misc !!}</li>
                                    </ul>

                                    @break
                                @endswitch
                                @if (count($division) > 0 && $season->type == "league")
                                    <h3>Standings:</h3>
                                    <div class="row">
                                    @foreach($division as $div)
                                        <div class="col-12">
                                            <h4 class="mtop60">{{ $div->division_name != '' ? $div->division_name.' Division' : ''}} </h4>
                                            @php
                                                $teams = App\Models\team::where('division_id', $div->id)->get();
                                            @endphp
                                            <table class="standings-table">
                                                <thead>
                                                <tr>
                                                    <th class="standings-click" data-class="team">Team <i class="fa fa-sort-desc"></i></th>
                                                    <th class="standings-click" data-class="games"><i class="fa fa-sort-desc"></i> Games Played</th>
                                                    <th class="standings-click" data-class="score"><i class="fa fa-sort-desc"></i> Score</th>
                                                    <th class="standings-click" data-class="kills"><i class="fa fa-sort-desc"></i> K</th>
                                                    <th class="standings-click" data-class="deaths"><i class="fa fa-sort-desc"></i> D</th>
                                                    <th class="standings-click" data-class="assists"><i class="fa fa-sort-desc"></i> A</th>
                                                    <th class="standings-click" data-class="kd"><i class="fa fa-sort-desc"></i> KD</th>
                                                    <th class="standings-click" data-class="kda"><i class="fa fa-sort-desc"></i> KDA</th>
                                                    <th class="standings-click" data-class="points"><i class="fa fa-sort-desc active"></i> <strong>Points</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($standings1 as $team)
                                                    @if($team->division_id == $div->id)
                                                    @php
                                                        $games_played = 0;
                                                        $total_points = 0 - $team->penalty;
                                                        if ($team->score_one != NULL) {
                                                            $total_points += $team->score_one;
                                                        }
                                                        foreach ($standings2 as $teamTwo) {
                                                            if ($team->id == $teamTwo->id) {
                                                                $total_points += $teamTwo->score_two;
                                                            }
                                                        }
                                                        $pilots = Illuminate\Support\Facades\DB::table('pilots')->where('team_id', $team->id)->get();
                                                        $added_score = 0;
                                                        $added_kills = 0;
                                                        $added_deaths = 0;
                                                        $added_assists = 0;

                                                        foreach ($pilots as $pilot) {
                                                            // SELECT SUM(score) as puntos FROM pilot_stats WHERE pilot_id = 7
                                                            $tempScore = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(score) as puntos')->where('pilot_id', $pilot->id)->get();
                                                            $tempKills = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(kills) as qills')->where('pilot_id', $pilot->id)->get();
                                                            $tempDeaths = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(deaths) as muertes')->where('pilot_id', $pilot->id)->get();
                                                            $tempAssists = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(assists) as asistencias')->where('pilot_id', $pilot->id)->get();
                                                            $added_score += $tempScore[0]->puntos;
                                                            $added_kills += $tempKills[0]->qills;
                                                            $added_deaths += $tempDeaths[0]->muertes;
                                                            $added_assists += $tempAssists[0]->asistencias;

                                                        }
                                                        $temp_games_played_one = Illuminate\Support\Facades\DB::table('matchups')
                                                            ->where('team1_id', $team->id)
                                                            ->get();
                                                        $temp_games_played_two = Illuminate\Support\Facades\DB::table('matchups')
                                                            ->where('team2_id', $team->id)
                                                            ->get();
														foreach ($temp_games_played_one as $row) {
															if (!$row->team1_score == 0 || !$row->team2_score == 0) {
																$games_played++;
															}
														}
														foreach ($temp_games_played_two as $row) {
															if (!$row->team1_score == 0 || !$row->team2_score == 0) {
																$games_played++;
															}
														}
                                                    @endphp
                                                    <tr class="tr-stand-sort" data-id="{{ $team->id }}" id="{{ $team->team_name }}">
                                                        <td class="data-team" data-id="{{ $team->id }}" data-value="{{ $team->team_name }}">{{ $team->team_name }} {!! $team->penalty == 0 ? '' : '<span>(Penalty: '.$team->penalty.')</span>' !!}<img src="/images/teams/{{ $team->logo != '' ? $team->logo : 'default.png' }}" alt="{{ $team->team_name }} logo"></td>
                                                        <td class="data-games" data-id="{{ $team->id }}" data-value="{{ $games_played }}">
                                                            {{ $games_played }}
                                                        </td>
                                                        <td class="data-score" data-id="{{ $team->id }}" data-value="{{ $added_score }}">
                                                                {{ number_format($added_score) }}
                                                        </td>
                                                        <td class="data-kills" data-id="{{ $team->id }}" data-value="{{ $added_kills }}">
                                                            {{ $added_kills }}
                                                        </td>
                                                        <td class="data-deaths" data-id="{{ $team->id }}" data-value="{{ $added_deaths }}">
                                                            {{ $added_deaths }}
                                                        </td>
                                                        <td class="data-assists" data-id="{{ $team->id }}" data-value="{{ $added_assists }}">
                                                            {{ $added_assists }}
                                                        </td>
                                                        <td class="data-kd" data-id="{{ $team->id }}" data-value="{{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
                                                            {{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}
                                                        </td>
                                                        <td class="data-kda" data-id="{{ $team->id }}" data-value="{{ number_format(($added_kills + ($added_assists / 2))/ ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
                                                            {{ number_format(($added_kills + ($added_assists / 2))/ ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}
                                                        </td>
                                                        <td class="data-points" data-id="{{ $team->id }}" data-value="{{ $total_points }}" data-value-two="{{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
                                                            {{ $total_points }}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                   @endforeach
                                    </div>
                                @endif
                                    <br>
                                        @php
                                            $icounter = isset($_GET['full']) ? 100000 : 10;
                                            $recent_games = Illuminate\Support\Facades\DB::table('matches')->orderByDesc('id')->get();
											if (count($recent_games) != 0) {
												echo '
                                            <h3>Recent Games</h3>
                                                <ul class="recent-games">
                                                      ';
                                                foreach ($recent_games as $singleGame) {
                                                    if ($icounter) {
														$this_matchup = Illuminate\Support\Facades\DB::table('matchups')->where('id', $singleGame->matchup_id)->first();
														$team_one = Illuminate\Support\Facades\DB::table('teams')->where('id', $this_matchup->team1_id)->first();
														$team_two = Illuminate\Support\Facades\DB::table('teams')->where('id', $this_matchup->team2_id)->first();
														$stats1 = Illuminate\Support\Facades\DB::table('pilot_stats')->join('pilots', 'pilots.id', '=', 'pilot_stats.pilot_id')->select('pilot_stats.*', 'pilots.pilot_name', 'pilots.team_id')->where('match_id', $singleGame->id)->where('team_id', $this_matchup->team1_id)->get();
														$stats2 = Illuminate\Support\Facades\DB::table('pilot_stats')->join('pilots', 'pilots.id', '=', 'pilot_stats.pilot_id')->select('pilot_stats.*', 'pilots.pilot_name', 'pilots.team_id')->where('match_id', $singleGame->id)->where('team_id', $this_matchup->team2_id)->get();
														$scoreboard_one = 0;
														$scoreboard_two = 0;
														foreach ($stats1 as $stat) {
															$scoreboard_one += $stat->deaths;
														}
														foreach ($stats2 as $stat) {
															$scoreboard_two += $stat->deaths;
														}
														$win_state1 = $scoreboard_one < $scoreboard_two ? 'winner' : 'loser';
														$win_state2 = $scoreboard_one > $scoreboard_two ? 'winner' : 'loser';

														if ($scoreboard_one == $scoreboard_two) {
															$win_state1 = 'draw';
															$win_state2 = 'draw';
														}
														$faction1 = $singleGame->faction ? 'empire' : 'rebel';
														$faction2 = $singleGame->faction ? 'rebel' : 'empire';

                                                        echo '
                                                    <li>
                                                        <h4>'.$team_one->team_name.' vs '.$team_two->team_name.' - Game '.$singleGame->game.'</h4>
                                                        <p class="map">Map: '.$singleGame->map.'</p>
                                                        <div class="team-sides-wrapper">
                                                            <div class="team_one_side">
                                                                <div class="scoreboard-wrapper">
                                                                    <h5><img src="/images/'.$faction1.'-logo.png" alt="'.$faction1.' logo" /> '.$team_one->team_name.' <span class="'.$win_state1.'">'.$scoreboard_two.'</span></h5>
                                                                </div>
                                                        ';
														echo '
                                                                <div class="single-match-wrapper">
                                                                    <table class="single-match-stats">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Player</th>
                                                                            <th>Score</th>
                                                                            <th>K</th>
                                                                            <th>D</th>
                                                                            <th>A</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                        ';
														foreach ($stats1 as $stat) {
															echo '
                                                                        <tr>
                                                                            <td>'.$stat->pilot_name.'</td>
                                                                            <td>'.$stat->score.'</td>
                                                                            <td>'.$stat->kills.'</td>
                                                                            <td>'.$stat->deaths.'</td>
                                                                            <td>'.$stat->assists.'</td>
                                                                        </tr>
															';
														}
														echo '
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

														';
														echo '
                                                            <div class="team_two_side">

                                                                <div class="scoreboard-wrapper">
                                                                    <h5><img src="/images/'.$faction2.'-logo.png" alt="'.$faction2.' logo" /> '.$team_two->team_name.' <span class="'.$win_state2.'">'.$scoreboard_one.'</span></h5>
                                                                </div>
                                                                <div class="single-match-wrapper">
                                                                    <table class="single-match-stats">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Player</th>
                                                                            <th>Score</th>
                                                                            <th>K</th>
                                                                            <th>D</th>
                                                                            <th>A</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                        ';
														foreach ($stats2 as $stat) {
															echo '
                                                                        <tr>
                                                                            <td>'.$stat->pilot_name.'</td>
                                                                            <td>'.$stat->score.'</td>
                                                                            <td>'.$stat->kills.'</td>
                                                                            <td>'.$stat->deaths.'</td>
                                                                            <td>'.$stat->assists.'</td>
                                                                        </tr>
															';
														}
														echo '
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
														';

                                                        echo '
                                                    </li>';
                                                        $icounter--;
                                                    }
                                                }
												echo '
                                                </ul>
												';
											}


                                        @endphp
                                @else
                                <p class="no-season">There is no active season right now.</p>
                                <p class="no-season">You can check previous seasons in our <a href="seasons">season archive</a>.</p>
                            @endif
                        @else
                                <p class="no-season">There is no active season right now.</p>
                                <p class="no-season">You can check previous seasons in our <a href="seasons">season archive</a>.</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
{{-- SELECT count(map) AS times, map FROM matches GROUP BY map --}}
{{-- --}}
