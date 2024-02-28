@extends('layouts.app')

@section('content')
    <main id="pilots">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Current Season Pilots</h2>
                    @if($season != '')
                        @if ($season->show === 1)
                            @if(count($divisions) > 1)
                    <h3 class="division-filter-title">Filter by: </h3>
                    <ul class="division-filter">
                        <li class="selected" data-division="0">All Divisions</li>
                        @foreach($divisions as $div)
                        <li data-division="division-{{ $div->id }}">{{ $div->division_name }} Division</li>
                        @endforeach
                    </ul>
                            @endif
                    <table id="main_stats">
                        <thead>
                        <tr>
                            <th class="stat-click" data-class="pilot">Pilot <i class="fa fa-sort-desc active"></i></th>
                            <th class="stat-click" data-class="score"><i class="fa fa-sort-desc"></i> Score</th>
                            <th class="stat-click" data-class="kills"><i class="fa fa-sort-desc"></i> K</th>
                            <th class="stat-click" data-class="deaths"><i class="fa fa-sort-desc"></i> D</th>
                            <th class="stat-click" data-class="assists"><i class="fa fa-sort-desc"></i> A</th>
                            <th class="stat-click" data-class="ai"><i class="fa fa-sort-desc"></i> AI</th>
                            <th class="stat-click" data-class="cap"><i class="fa fa-sort-desc"></i> CAP</th>
                            <th class="stat-click" data-class="won"><i class="fa fa-sort-desc"></i> W</th>
{{--                            <th class="click-tied">D</th>--}}
                            <th class="stat-click" data-class="lost"><i class="fa fa-sort-desc"></i> L</th>
                            <th class="stat-click" data-class="kd"><i class="fa fa-sort-desc"></i> KD</th>
                            <th class="stat-click" data-class="kda"><i class="fa fa-sort-desc"></i> KDA</th>
                            <th class="stat-click" data-class="wl"><i class="fa fa-sort-desc"></i> WL</th>
                        </tr>
                        </thead>
                        <tbody>

                        @for($i = 0; $i < count($pilots); $i++)
                            <tr class="tr-sort division-{{ \App\Models\team::where('id', $pilots[$i]->team_id)->first()->division_id }}" data-id="{{ $i }}" id="{{ $pilots[$i]->pilot_name }}">
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


                                <td class="data-pilot" data-id="{{ $i }}" data-value="{{ $pilots[$i]->pilot_name }}">[{{ $pilots[$i]->initials }}] <strong><a href="/pilot/{{ $pilots[$i]->pilot_name }}" target="_blank">{{ $pilots[$i]->pilot_name }}</a></strong> <em class="small">({{ $pilots[$i]->misc }})</em>
                                    <span>{{ $pilots[$i]->team_name }}</span>
                                    <span>Games played: {{ $games_total[0]->games_total }}</span>
                                </td>
                                <td class="data-score" data-id="{{ $i }}" data-value="{{ $score_total[0]->score_total == NULL ? 0 : $score_total[0]->score_total }}">
                                    {{ number_format($score_total[0]->score_total == NULL ? 0 : $score_total[0]->score_total) }}
                                    <span>{{ number_format(round($score_total[0]->score_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)))) }}</span>
                                </td>
                                <td class="data-kills" data-id="{{ $i }}" data-value="{{ $kills_total[0]->kills_total == NULL ? 0 : $kills_total[0]->kills_total }}">
                                    {{ $kills_total[0]->kills_total == NULL ? 0 : $kills_total[0]->kills_total }}
                                    <span>{{ number_format($kills_total[0]->kills_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                </td>
                                <td class="data-deaths" data-id="{{ $i }}" data-value="{{ $deaths_total[0]->deaths_total == NULL ? 0 : $deaths_total[0]->deaths_total}}">
                                    {{ $deaths_total[0]->deaths_total  == NULL ? 0 : $deaths_total[0]->deaths_total}}
                                    <span>{{ number_format($deaths_total[0]->deaths_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                </td>
                                <td class="data-assists" data-id="{{ $i }}" data-value="{{ $assists_total[0]->assists_total == NULL ? 0 : $assists_total[0]->assists_total}}">
                                    {{ $assists_total[0]->assists_total == NULL ? 0 : $assists_total[0]->assists_total }}
                                    <span>{{ number_format($assists_total[0]->assists_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                </td>
                                <td class="data-ai" data-id="{{ $i }}" data-value="{{ $ai_total[0]->ai_total == NULL ? 0 : $ai_total[0]->ai_total}}">
                                    {{ number_format($ai_total[0]->ai_total == NULL ? 0 : $ai_total[0]->ai_total) }}
                                    <span>{{ number_format($ai_total[0]->ai_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                </td>
                                <td class="data-cap" data-id="{{ $i }}" data-value="{{ $cap_total[0]->cap_total == NULL ? 0 : $cap_total[0]->cap_total}}">
                                    {{ number_format($cap_total[0]->cap_total == NULL ? 0 : $cap_total[0]->cap_total) }}
                                    <span>{{ number_format($cap_total[0]->cap_total / ($games_total[0]->games_total == 0 ? 1 : intval($games_total[0]->games_total)), 2) }}</span>
                                </td>
                                <td class="data-won" data-id="{{ $i }}" data-value="{{ $won_total[0]->won_total == NULL ? 0 : $won_total[0]->won_total }}">
                                    {{ $won_total[0]->won_total == NULL ? 0 : $won_total[0]->won_total }}
                                </td>
{{--                                --}}
{{--                                <td class="data-tied" data-id="{{ $i }}" data-value="{{ $tied_total[0]->tied_total == NULL ? 0 : $tied_total[0]->tied_total }}">--}}
{{--                                    {{ $tied_total[0]->tied_total == NULL ? 0 : $tied_total[0]->tied_total }}--}}
{{--                                </td>--}}
{{--                                --}}
                                <td class="data-lost" data-id="{{ $i }}" data-value="{{ $lost_total[0]->lost_total == NULL ? 0 : $lost_total[0]->lost_total }}">
                                    {{ $lost_total[0]->lost_total == NULL ? 0 : $lost_total[0]->lost_total }}
                                </td>
                                <td class="data-kd" data-id="{{ $i }}" data-value="{{ number_format($kills_total[0]->kills_total / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}">
                                    {{ number_format($kills_total[0]->kills_total / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}
                                </td>
                                <td class="data-kda" data-id="{{ $i }}" data-value="{{ number_format(($kills_total[0]->kills_total + ($assists_total[0]->assists_total / 2)) / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}">
                                    {{ number_format(($kills_total[0]->kills_total + ($assists_total[0]->assists_total / 2)) / ($deaths_total[0]->deaths_total == 0 ? 1 : intval($deaths_total[0]->deaths_total)), 2) }}
                                </td>
                                <td class="data-wl" data-id="{{ $i }}" data-value="{{ number_format($won_total[0]->won_total / ($lost_total[0]->lost_total == 0 ? 1 : intval($lost_total[0]->lost_total)), 2) }}">
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
    </main>
@endsection
