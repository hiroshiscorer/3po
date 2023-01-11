@extends('layouts.app')

@section('content')
    <main id="schedule">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Current Season Schedule</h2>
                    @if($divisions != '')
                        @if ($season->show === 1)
                            @foreach($divisions as $div) {{-- Division --}}
                                @if($div->division_name != NULL)
                                <h3>{{ $div->division_name }} Division</h3>
                                @endif
                                @for($i = 1; $i <= $div->rounds; $i++) {{-- Round --}}
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
                                    @foreach($thisDate as $match) {{-- Matchups --}}
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
                                            <span class="{{ $result_class_1 }}">{{ $scoreboard1 }}</span></p>
                                        <p>
                                            <span>{{ $team2->team_name }}</span>
                                            <span>-</span>
                                            <span class="{{ $result_class_2 }}">{{ $scoreboard2 }}</span>
                                        </p>
                                        @if($match->calendar != '')
                                                <p class="calendar"><strong>Current scheduled time:</strong> {!! $match->calendar !!}</p>
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
