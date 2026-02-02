@extends('layouts.app')
@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
		use App\Models\team;
		use App\Models\game;
		use App\Models\division;

		$number_pilot_per_game = 10; // 3PO
		// $number_pilot_per_game = 10; // SABACC
    @endphp
    <main id="admin-report" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Report Games</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Game added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Game edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Game is not empty, delete pilot stats first</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Game removed</p>
                    @endif

                    <h3 class="mtop60">Report new Game</h3>
                    <form action="/admin-report-add" method="post">
                        @csrf
                        <label for="new-report-matchup_id">Select Matchup</label>
                        <select name="matchup_id" id="new-report-matchup_id" required>
                            <option value="">--- Select an option ---</option>
                            @foreach($matchups as $matchup)
                                @if(game::where('matchup_id', $matchup->id)->count() == 0)
                                    <option
                                        value="{{ $matchup->id }}" data-team1="{{ $matchup->team1_id }}" data-team2="{{ $matchup->team2_id }}">{{ strtoupper(division::where('id', $matchup->division_id)->first()->division_name) . '-' . $matchup->round}} {{ team::where('id', $matchup->team1_id)->first()->team_name }}
                                        vs {{ team::where('id', $matchup->team2_id)->first()->team_name }} </option>
                                @endif
                            @endforeach
                        </select>

                        <div class="form-like">
                            <h5>Game 1</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="1-new-report-faction">Team 1 Faction <span class="small">(Team 2 gets assigned the other faction automatically)</span></label>
                                    <select name="faction_1" id="1-new-report-faction">
                                        <option value="0">New Republic</option>
                                        <option value="1">Galactic Empire</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="1-new-report-map">Map</label>
                                    <select name="map_1" id="1-new-report-map" required>
                                        <option value="">--- Select a Map ---</option>
                                        <option value="Fostar Haven">Fostar Haven</option>
                                        <option value="Galitan">Galitan</option>
                                        <option value="Esseles">Esseles</option>
                                        <option value="Nadiri Dockyards">Nadiri Dockyards</option>
                                        <option value="Sissubo">Sissubo</option>
                                        <option value="Yavin Prime">Yavin Prime</option>
                                        <option value="Zavian Abyss">Zavian Abyss</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="1-new-report-winner">Game Winner</label>
                                    <select name="winner_1" id="1-new-report-winner">
                                        <option value="team1">Team 1</option>
                                        <option value="team2">Team 2</option>
                                        <option value="tie">Tie</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            @for($a = 0; $a < $number_pilot_per_game; $a++)
                            <label for="1-report-pilot-{{ $a }}">Pilot {{ $a+1 }}</label>
                            <select class="pilot-list" name="one_pilot_id[]" id="1-report-pilot-{{ $a }}">
                                <option value="">--- Select a pilot ---</option>
                                @foreach($pilots as $pilot)
                                    <option value="{{ $pilot->id }}" data-team="{{ $pilot->team_id }}">{{ $pilot->pilot_name }}</option>
                                @endforeach
                            </select>
                                <div class="row">
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-score-{{ $a }}">Score</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-score-{{ $a }}" name="one_score[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-kills-{{ $a }}">Kills</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-kills-{{ $a }}" name="one_kills[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-deaths-{{ $a }}">Deaths</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-deaths-{{ $a }}" name="one_deaths[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-assists-{{ $a }}">Assists</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-assists-{{ $a }}" name="one_assists[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-ai-{{ $a }}">AI Kills</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-ai-{{ $a }}" name="one_ai[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="1-team1-cap-{{ $a }}">Cap Ship Damage</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="1-team1-cap-{{ $a }}" name="one_cap[]">
                                    </div>
                                </div>
                            @endfor

                        </div>

                        <div class="form-like">
                            <h5>Game 2</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="2-new-report-faction">Team 1 Faction <span class="small">(Team 2 gets assigned the other faction automatically)</span></label>
                                    <select name="faction_2" id="2-new-report-faction">
                                        <option value="0">New Republic</option>
                                        <option value="1">Galactic Empire</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="2-new-report-map">Map</label>
                                    <select name="map_2" id="2-new-report-map" required>
                                        <option value="">--- Select a Map ---</option>
                                        <option value="Fostar Haven">Fostar Haven</option>
                                        <option value="Galitan">Galitan</option>
                                        <option value="Esseles">Esseles</option>
                                        <option value="Nadiri Dockyards">Nadiri Dockyards</option>
                                        <option value="Sissubo">Sissubo</option>
                                        <option value="Yavin Prime">Yavin Prime</option>
                                        <option value="Zavian Abyss">Zavian Abyss</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="2-new-report-winner">Game Winner</label>
                                    <select name="winner_2" id="2-new-report-winner">
                                        <option value="team1">Team 1</option>
                                        <option value="team2">Team 2</option>
                                        <option value="tie">Tie</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            @for($a = 0; $a < $number_pilot_per_game; $a++)
                            <label for="2-report-pilot-{{ $a }}">Pilot {{ $a+1 }}</label>
                            <select class="pilot-list" name="two_pilot_id[]" id="2-report-pilot-{{ $a }}">
                                <option value="">--- Select a pilot ---</option>
                                @foreach($pilots as $pilot)
                                    <option value="{{ $pilot->id }}" data-team="{{ $pilot->team_id }}">{{ $pilot->pilot_name }}</option>
                                @endforeach
                            </select>
                                <div class="row">
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-score-{{ $a }}">Score</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-score-{{ $a }}" name="two_score[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-kills-{{ $a }}">Kills</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-kills-{{ $a }}" name="two_kills[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-deaths-{{ $a }}">Deaths</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-deaths-{{ $a }}" name="two_deaths[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-assists-{{ $a }}">Assists</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-assists-{{ $a }}" name="two_assists[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-ai-{{ $a }}">AI Kills</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-ai-{{ $a }}" name="two_ai[]">
                                    </div>
                                    <div class="col">
                                        <label class="mtop0" for="2-team1-cap-{{ $a }}">Cap Ship Damage</label>
                                        <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="2-team1-cap-{{ $a }}" name="two_cap[]">
                                    </div>
                                </div>
                            @endfor

                        </div>

                        <button type="submit">Report</button>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
