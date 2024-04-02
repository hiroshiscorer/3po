@extends('layouts.app')

@section('content')
    <main id="archive">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">3PO League - {{ $season->season_name }}</h2>
                    <div class="row">
                        <div class="col-12">

                            <div class="home-card">
                                <section class="padTop" id="home">

                                    @if($divisions != '')
                                        @if ($season->show === 1)
                                            <h2>Archived Season<span>{{ $season->season_name }}</span></h2>


                                            @switch($season->type)
                                                @case('league')
                                                    <ul>
                                                        <li>Type: League</li>
                                                        <li>Divisions: {{ count($divisions) }}</li>
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
                                            @if (count($divisions) > 0 && $season->type == "league")
                                                <h3>Standings:</h3>
                                                <div class="row">
                                                    @foreach($divisions as $div)
                                                        <div class="col-12">
                                                            <h4 class="mtop60">{{ $div->division_name != '' ? $div->division_name.' Division' : ''}} </h4>
                                                            @php
                                                                $teams = App\Models\team::where('division_id', $div->id)->get();
                                                            @endphp
                                                            <table class="standings-table">
                                                                <thead>
                                                                <tr>
                                                                    <th class="standings-click" data-class="team">Team
                                                                        <i class="fa fa-sort-desc"></i></th>
                                                                    <th class="standings-click" data-class="games"><i
                                                                            class="fa fa-sort-desc"></i> Games Played
                                                                    </th>
                                                                    <th class="standings-click" data-class="score"><i
                                                                            class="fa fa-sort-desc"></i> Score
                                                                    </th>
                                                                    <th class="standings-click" data-class="kills"><i
                                                                            class="fa fa-sort-desc"></i> K
                                                                    </th>
                                                                    <th class="standings-click" data-class="deaths"><i
                                                                            class="fa fa-sort-desc"></i> D
                                                                    </th>
                                                                    <th class="standings-click" data-class="ai"><i
                                                                            class="fa fa-sort-desc"></i> AI
                                                                    </th>
                                                                    <th class="standings-click" data-class="cap"><i
                                                                            class="fa fa-sort-desc"></i> CAP
                                                                    </th>
                                                                    <th class="standings-click" data-class="kd"><i
                                                                            class="fa fa-sort-desc"></i> KD
                                                                    </th>
                                                                    <th class="standings-click" data-class="kda"><i
                                                                            class="fa fa-sort-desc"></i> KDA
                                                                    </th>
                                                                    <th class="standings-click" data-class="points"><i
                                                                            class="fa fa-sort-desc active"></i> <strong>Points</strong>
                                                                    </th>
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
                                                                            $pil = Illuminate\Support\Facades\DB::table('pilots')->where('team_id', $team->id)->get();
                                                                            $added_score = 0;
                                                                            $added_kills = 0;
                                                                            $added_deaths = 0;
                                                                            $added_assists = 0;
                                                                            $added_ai = 0;
                                                                            $added_cap = 0;

                                                                            foreach ($pil as $pilot) {
                                                                                // SELECT SUM(score) as puntos FROM pilot_stats WHERE pilot_id = 7
                                                                                $tempScore = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(score) as puntos')->where('pilot_id', $pilot->id)->get();
                                                                                $tempKills = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(kills) as qills')->where('pilot_id', $pilot->id)->get();
                                                                                $tempDeaths = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(deaths) as muertes')->where('pilot_id', $pilot->id)->get();
                                                                                $tempAssists = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(assists) as asistencias')->where('pilot_id', $pilot->id)->get();
                                                                                $tempAi = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(ai_kills) as aiqills')->where('pilot_id', $pilot->id)->get();
                                                                                $tempCap = Illuminate\Support\Facades\DB::table('pilot_stats')->selectRaw('SUM(cap_damage) as capdam')->where('pilot_id', $pilot->id)->get();
                                                                                $added_score += $tempScore[0]->puntos;
                                                                                $added_kills += $tempKills[0]->qills;
                                                                                $added_deaths += $tempDeaths[0]->muertes;
                                                                                $added_assists += $tempAssists[0]->asistencias;
                                                                                $added_ai += $tempAi[0]->aiqills;
                                                                                $added_cap += $tempCap[0]->capdam;

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
                                                                        <tr class="tr-stand-sort"
                                                                            data-id="{{ $team->id }}"
                                                                            id="{{ $team->team_name }}">
                                                                            <td class="data-team"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $team->team_name }}">{{ $team->team_name }} {!! $team->penalty == 0 ? '' : '<span>(Penalty: '.$team->penalty.')</span>' !!}
                                                                                <img
                                                                                    src="/images/teams/{{ $team->logo != '' ? $team->logo : 'default.png' }}"
                                                                                    alt="{{ $team->team_name }} logo">
                                                                            </td>
                                                                            <td class="data-games"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $games_played }}">
                                                                                {{ $games_played }}
                                                                            </td>
                                                                            <td class="data-score"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $added_score }}">
                                                                                {{ number_format($added_score) }}
                                                                            </td>
                                                                            <td class="data-kills"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $added_kills }}">
                                                                                {{ $added_kills }}
                                                                            </td>
                                                                            <td class="data-deaths"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $added_deaths }}">
                                                                                {{ $added_deaths }}
                                                                            </td>
                                                                            <td class="data-ai"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $added_ai }}">
                                                                                {{ number_format($added_ai) }}
                                                                            </td>
                                                                            <td class="data-cap"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $added_cap }}">
                                                                                {{ number_format($added_cap) }}
                                                                            </td>
                                                                            <td class="data-kd"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
                                                                                {{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}
                                                                            </td>
                                                                            <td class="data-kda"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ number_format(($added_kills + ($added_assists / 2))/ ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
                                                                                {{ number_format(($added_kills + ($added_assists / 2))/ ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}
                                                                            </td>
                                                                            <td class="data-points"
                                                                                data-id="{{ $team->id }}"
                                                                                data-value="{{ $total_points }}"
                                                                                data-value-two="{{ number_format($added_kills / ($added_deaths == 0 ? 1 : intval($added_deaths)), 2) }}">
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

                                </section>
                                <br>
                                <section class="padTop" id="schedule">
                                    <h2 class="title">Archived Season Schedule</h2>
                                    @foreach($divisions as $div)
                                        {{-- Division --}}
                                        @if($div->division_name != NULL)
                                            <h3>{{ $div->division_name }} Division</h3>
                                        @endif
                                        @for($i = 1; $i <= $div->rounds; $i++)
                                            {{-- Round --}}
                                            @php
                                                $byeArray = [];
                                                $thisDate = App\Models\matchup::where('round', $i)->where('division_id', $div->id)->get();

                                            @endphp
                                            @if($season->type == 'league')
                                                <h4>Round {{ $i }}</h4>
                                            @elseif($season->type == 'tourney')
                                                @php
                                                    $round_of_number = $div->rounds - $i;
                                                    switch ($round_of_number) {
                                                        case 0:
                                                            $round_name = 'Final';
                                                            $exp_round = 1;
                                                            break;
                                                        case 1:
                                                            $round_name = 'Semifinals';
                                                            $exp_round = 2;
                                                            break;
                                                        case 2:
                                                            $round_name = 'Quarterfinals';
                                                            $exp_round = 4;
                                                            break;
                                                        case 3:
                                                            $round_name = 'Round of 16';
                                                            $exp_round = 8;
                                                            break;
                                                        case 4:
                                                            $round_name = 'Round of 32';
                                                            $exp_round = 16;
                                                            break;
                                                        case 5:
                                                            $round_name = 'Round of 64';
                                                            $exp_round = 32;
                                                        case 6:
                                                            $round_name = 'Round of 128';
                                                            $exp_round = 64;
                                                            break;
                                                        default:
                                                            $round_name = "";
                                                            $exp_round = 1;
                                                    }
                                                @endphp
                                                <h4>{{ $round_name }}</h4>
                                            @endif
                                            <div class="matchup-wrapper">
                                                @if (count($thisDate) == 0 && $season->type == 'tourney')
                                                    @for($j = 0; $j < $exp_round; $j++)
                                                        <div class="matchup-item" data-id="2022">
                                                            <h5>{{ $round_name }}</h5>
                                                            <p>
                                                                <span>TBD</span>
                                                                <span>-</span>
                                                                <span class="">TBD</span></p>
                                                            <p>
                                                                <span>TBD</span>
                                                                <span>-</span>
                                                                <span class="">TBD</span>
                                                            </p>
                                                            <p class="calendar">No scheduled time yet.</p>
                                                        </div>
                                                    @endfor

                                                @endif
                                                @foreach($thisDate as $match)
                                                    {{-- Matchups --}}
                                                    @php
                                                        array_push($byeArray, $match->team1_id, $match->team2_id);
                                                            $team1 = App\Models\team::where('id', $match->team1_id)->first();
                                                            $team2 = App\Models\team::where('id', $match->team2_id)->first();
                                                            if ($match->team1_score == 0 && $match->team2_score == 0) {
                                                                $scoreboard1 = "TBD";
                                                                $scoreboard2 = "TBD";
                                                            } else {
                                                                $scoreboard1 = $match->team1_score;
                                                                $scoreboard2 = $match->team2_score;
                                                            }
                                                            if (intval($match->team1_score) > intval($match->team2_score)) {
                                                                $result_class_1 = 'square-won';
                                                                $result_class_2 = 'square-lost';
                                                            } elseif (intval($match->team1_score) < intval($match->team2_score)) {
                                                                $result_class_2 = 'square-won';
                                                                $result_class_1 = 'square-lost';
                                                            } elseif ($match->team1_score == 0 && $match->team2_score == 0) {
                                                                $result_class_1 = '';
                                                                $result_class_2 = '';
                                                            } else {
                                                                $result_class_1 = 'square-tied';
                                                                $result_class_2 = 'square-tied';
                                                            }
                                                    @endphp
                                                    <div class="matchup-item" data-id="{{ $match->id }}">
                                                        @if($season->type == 'tourney')
                                                            <h5>{{ $match->bracket }}</h5>
                                                        @endif
                                                        <p>
                                                            <span>{{ $team1->team_name }}</span>
                                                            <span>-</span>
                                                            <span
                                                                class="{{ $result_class_1 }}">{{ $scoreboard1 }}</span>
                                                        </p>
                                                        <p>
                                                            <span>{{ $team2->team_name }}</span>
                                                            <span>-</span>
                                                            <span
                                                                class="{{ $result_class_2 }}">{{ $scoreboard2 }}</span>
                                                        </p>
                                                        @if($match->calendar != '')
                                                            <p class="calendar"><strong>Current scheduled
                                                                    time:</strong> {!! $match->calendar !!}</p>
                                                        @else
                                                            <p class="calendar">No scheduled time yet.</p>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                @php
                                                    $teams_in_div = App\Models\team::where('division_id', $div->id)->get();
                                                @endphp
                                                @foreach($teams_in_div as $team_in_div)
                                                    @php
                                                        if (!in_array($team_in_div->id, $byeArray) && $season->type == 'league') {
                                                            echo '
                                                            <div class="matchup-item">
                                                            <p><span>'.$team_in_div->team_name.'</span> <span>-</span> <span>BYE</span></p>
                                                            </div>
                                                            ';
                                                        }
                                                    @endphp
                                                @endforeach
                                            </div>

                                        @endfor
                                    @endforeach


                                </section>
                                <section class="padTop" id="teams">
                                    <h2 class="title">Archived Season Teams</h2>
                                    <ul class="card-like">
                                        @foreach($divisions as $div)
                                            @php
                                                $teams = App\Models\team::where('division_id', $div->id)->get();
                                            @endphp
                                            @foreach($teams as $item)
                                                @php
                                                    $pil = App\Models\pilot::where('team_id', $item->id)->get();
                                                @endphp
                                                <li><img
                                                        src="/images/teams/{{ $item->logo != "" ? $item->logo : 'default.png' }}"
                                                        alt="{{ $item->team_name }} logo">
                                                    <h3>{{ $item->team_name }}
                                                        <span class="club">{{ $item->club }}</span>
                                                        @if($div->division_name != NULL)
                                                            <span
                                                                class="sub-info">{{ $div->division_name }} Division</span>
                                                        @endif
                                                    </h3>
                                                    <ul>
                                                        @foreach($pil as $pilot)
                                                            <li>
                                                                <a href="#{{ $pilot->pilot_name }}">[{{ $item->initials }}
                                                                    ] <strong>{{ $pilot->pilot_name }}</strong> <em
                                                                        class="small">{{ $pilot->misc != '' ? '('.$pilot->misc.')' : '' }}</em></a>
                                                                {!! App\Models\pilotStat::where('pilot_id', $pilot->id)->count() ? '<i class="fa fa-lock" title="This player is locked in this team."></i>' : '' !!}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </section>
                                <section class="padTop" id="pilots">
                                    <h2 class="title">Archived Season Pilots</h2>
                                    @if(count($divisions) > 1)
                                        <h3 class="division-filter-title">Filter by: </h3>
                                        <ul class="division-filter">
                                            <li class="selected" data-division="0">All Divisions</li>
                                            @foreach($divisions as $div)
                                                <li data-division="division-{{ $div->id }}">{{ $div->division_name }}
                                                    Division
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <table id="main_stats">
                                        <thead>
                                        <tr>
                                            <th class="stat-click" data-class="pilot">Pilot <i
                                                    class="fa fa-sort-desc active"></i></th>
                                            <th class="stat-click" data-class="score"><i class="fa fa-sort-desc"></i>
                                                Score
                                            </th>
                                            <th class="stat-click" data-class="kills"><i class="fa fa-sort-desc"></i> K
                                            </th>
                                            <th class="stat-click" data-class="deaths"><i class="fa fa-sort-desc"></i> D
                                            </th>
                                            <th class="stat-click" data-class="assists"><i class="fa fa-sort-desc"></i>
                                                A
                                            </th>
                                            <th class="stat-click" data-class="ai"><i class="fa fa-sort-desc"></i> AI
                                            </th>
                                            <th class="stat-click" data-class="cap"><i class="fa fa-sort-desc"></i> CAP
                                            </th>
                                            <th class="stat-click" data-class="won"><i class="fa fa-sort-desc"></i> W
                                            </th>
                                            {{--                            <th class="click-tied">D</th>--}}
                                            <th class="stat-click" data-class="lost"><i class="fa fa-sort-desc"></i> L
                                            </th>
                                            <th class="stat-click" data-class="kd"><i class="fa fa-sort-desc"></i> KD
                                            </th>
                                            <th class="stat-click" data-class="kda"><i class="fa fa-sort-desc"></i> KDA
                                            </th>
                                            <th class="stat-click" data-class="wl"><i class="fa fa-sort-desc"></i> WL
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @for($i = 0; $i < count($pilots); $i++)
                                            <tr class="tr-sort division-{{ \App\Models\team::where('id', $pilots[$i]->team_id)->first()->division_id }}"
                                                data-id="{{ $i }}" id="{{ $pilots[$i]->pilot_name }}">
                                                @php
                                                    $games_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('COUNT(score) games_total'))->where('pilot_id', '=', $pilots[$i]->id)->get('games_total');
                                                    $score_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(score) score_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $kills_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(kills) kills_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $deaths_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(deaths) deaths_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $assists_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(assists) assists_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $ai_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(ai_kills) ai_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $cap_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(cap_damage) cap_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $won_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(match_won) won_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $tied_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(match_tied) tied_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                    $lost_total = \Illuminate\Support\Facades\DB::table('pilot_stats')->select(Illuminate\Support\Facades\DB::raw('SUM(match_lost) lost_total'))->where('pilot_id', '=', $pilots[$i]->id)->get();
                                                @endphp


                                                <td class="data-pilot" data-id="{{ $i }}"
                                                    data-value="{{ $pilots[$i]->pilot_name }}">
                                                    [{{ $pilots[$i]->initials }}] <strong><a
                                                            href="/card/proto-0/{{ $pilots[$i]->pilot_name }}"
                                                            target="_blank">{{ $pilots[$i]->pilot_name }}</a></strong>
                                                    <em class="small">{{ $pilots[$i]->misc != '' ? '('.$pilots[$i]->misc.')' : ''}}</em>
                                                    <span>{{ $pilots[$i]->team_name }}</span>
                                                    <span>Games played: {{ $games_total[0]->games_total }}</span>
                                                </td>
                                                <td class="data-score" data-id="{{ $i }}"
                                                    data-value="{{ $score_total[0]->score_total == NULL ? 0 : $score_total[0]->score_total }}">
                                                    {{ number_format($score_total[0]->score_total == NULL ? 0 : $score_total[0]->score_total) }}
                                                    <span>{{ number_format(round($score_total[0]->score_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)))) }}</span>
                                                </td>
                                                <td class="data-kills" data-id="{{ $i }}"
                                                    data-value="{{ $kills_total[0]->kills_total == NULL ? 0 : $kills_total[0]->kills_total }}">
                                                    {{ $kills_total[0]->kills_total == NULL ? 0 : $kills_total[0]->kills_total }}
                                                    <span>{{ number_format($kills_total[0]->kills_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                                </td>
                                                <td class="data-deaths" data-id="{{ $i }}"
                                                    data-value="{{ $deaths_total[0]->deaths_total == NULL ? 0 : $deaths_total[0]->deaths_total}}">
                                                    {{ $deaths_total[0]->deaths_total  == NULL ? 0 : $deaths_total[0]->deaths_total}}
                                                    <span>{{ number_format($deaths_total[0]->deaths_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                                </td>
                                                <td class="data-assists" data-id="{{ $i }}"
                                                    data-value="{{ $assists_total[0]->assists_total == NULL ? 0 : $assists_total[0]->assists_total}}">
                                                    {{ $assists_total[0]->assists_total == NULL ? 0 : $assists_total[0]->assists_total }}
                                                    <span>{{ number_format($assists_total[0]->assists_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                                </td>
                                                <td class="data-ai" data-id="{{ $i }}"
                                                    data-value="{{ $ai_total[0]->ai_total == NULL ? 0 : $ai_total[0]->ai_total}}">
                                                    {{ number_format($ai_total[0]->ai_total == NULL ? 0 : $ai_total[0]->ai_total) }}
                                                    <span>{{ number_format($ai_total[0]->ai_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                                </td>
                                                <td class="data-cap" data-id="{{ $i }}"
                                                    data-value="{{ $cap_total[0]->cap_total == NULL ? 0 : $cap_total[0]->cap_total}}">
                                                    {{ number_format($cap_total[0]->cap_total == NULL ? 0 : $cap_total[0]->cap_total) }}
                                                    <span>{{ number_format($cap_total[0]->cap_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                                </td>
                                                <td class="data-won" data-id="{{ $i }}"
                                                    data-value="{{ $won_total[0]->won_total == NULL ? 0 : $won_total[0]->won_total }}">
                                                    {{ $won_total[0]->won_total == NULL ? 0 : $won_total[0]->won_total }}
                                                </td>
                                                {{--                                --}}
                                                {{--                                <td class="data-tied" data-id="{{ $i }}" data-value="{{ $tied_total[0]->tied_total == NULL ? 0 : $tied_total[0]->tied_total }}">--}}
                                                {{--                                    {{ $tied_total[0]->tied_total == NULL ? 0 : $tied_total[0]->tied_total }}--}}
                                                {{--                                </td>--}}
                                                {{--                                --}}
                                                <td class="data-lost" data-id="{{ $i }}"
                                                    data-value="{{ $lost_total[0]->lost_total == NULL ? 0 : $lost_total[0]->lost_total }}">
                                                    {{ $lost_total[0]->lost_total == NULL ? 0 : $lost_total[0]->lost_total }}
                                                </td>
                                                <td class="data-kd" data-id="{{ $i }}"
                                                    data-value="{{ number_format($kills_total[0]->kills_total / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}">
                                                    {{ number_format($kills_total[0]->kills_total / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}
                                                </td>
                                                <td class="data-kda" data-id="{{ $i }}"
                                                    data-value="{{ number_format(($kills_total[0]->kills_total + ($assists_total[0]->assists_total / 2)) / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}">
                                                    {{ number_format(($kills_total[0]->kills_total + ($assists_total[0]->assists_total / 2)) / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}
                                                </td>
                                                <td class="data-wl" data-id="{{ $i }}"
                                                    data-value="{{ number_format($won_total[0]->won_total / ($lost_total[0]->lost_total == 0 ? 1 : intval($lost_total[0]->lost_total)), 2) }}">
                                                    {{ number_format($won_total[0]->won_total / ($lost_total[0]->lost_total == 0 ? 1 : intval($lost_total[0]->lost_total)), 2) }}
                                                </td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                    <ul class="data-key">
                                        <li>K = Kills</li>
                                        <li>W = Games won</li>
                                        <li>KD = Kill/Death Ratio</li>
                                        <li>D = Deaths</li>
                                        <li>L = Games lost</li>
                                        {{--                        <li>D = Games drawn</li>--}}
                                        <li>KDA = Kill/Death Ratio using Assists as half kills</li>
                                        <li>A = Assists</li>
                                        <li>WL = Games Won/Lost Ratio</li>
                                        <li>CAP = Capital Ship Damage</li>
                                        <li>AI - AI Kills</li>
                                        <li>The smaller number in parentheses is the stat average per game.</li>
                                    </ul>
                                </section>
                                <section class="padTop" id="games">
                                    @php
                                        $recent_games = Illuminate\Support\Facades\DB::table('games')->orderByDesc('id')->get();
                                        if (count($recent_games) != 0) {
                                            echo '
                                        <h3>All Games</h3>
                                            <ul class="recent-games">
                                                  ';
                                            foreach ($recent_games as $singleGame) {
                                                    $this_matchup = Illuminate\Support\Facades\DB::table('matchups')->where('id', $singleGame->matchup_id)->first();
                                                    $team_one = Illuminate\Support\Facades\DB::table('teams')->where('id', $this_matchup->team1_id)->first();
                                                    $team_two = Illuminate\Support\Facades\DB::table('teams')->where('id', $this_matchup->team2_id)->first();
                                                    $stats1 = Illuminate\Support\Facades\DB::table('pilot_stats')->join('pilots', 'pilots.id', '=', 'pilot_stats.pilot_id')->select('pilot_stats.*', 'pilots.pilot_name', 'pilots.team_id')->where('match_id', $singleGame->id)->where('team_id', $this_matchup->team1_id)->get();
                                                    $stats2 = Illuminate\Support\Facades\DB::table('pilot_stats')->join('pilots', 'pilots.id', '=', 'pilot_stats.pilot_id')->select('pilot_stats.*', 'pilots.pilot_name', 'pilots.team_id')->where('match_id', $singleGame->id)->where('team_id', $this_matchup->team2_id)->get();
                                                    $scoreboard_one = 0;
                                                    $scoreboard_two = 0;

                                                    foreach ($stats1 as $stat) {
                                                        $scoreboard_one = $stat->match_won;
                                                    }
                                                    foreach ($stats2 as $stat) {
                                                        $scoreboard_two = $stat->match_won;
                                                    }

                                                    /*
                                                    if ($stats1[0]->match_won) {
                                                        $scoreboard_one = 1;
                                                    } else {
                                                        $scoreboard_two = 1;
                                                    }
                                                    */
                                                    $win_state1 = $scoreboard_one > $scoreboard_two ? 'winner' : 'loser';
                                                    $win_state2 = $scoreboard_one < $scoreboard_two ? 'winner' : 'loser';

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
                                                                <h5><img src="/images/'.$faction1.'-logo.png" alt="'.$faction1.' logo" /> '.$team_one->team_name.' <span class="'.$win_state1.'">'.$scoreboard_one.'</span></h5>
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
                                                                <h5><img src="/images/'.$faction2.'-logo.png" alt="'.$faction2.' logo" /> '.$team_two->team_name.' <span class="'.$win_state2.'">'.$scoreboard_two.'</span></h5>
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

                                            }
                                            echo '
                                            </ul>
                                            ';
                                        }


                                    @endphp
                                </section>
                                @else
                                    <p class="no-season">There is no active season right now.</p>
                                    <p class="no-season">You can check previous seasons in our <a href="seasons">season
                                            archive</a>.</p>
                                @endif
                                @else
                                    <p class="no-season">There is no active season right now.</p>
                                    <p class="no-season">You can check previous seasons in our <a href="seasons">season
                                            archive</a>.</p>
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
