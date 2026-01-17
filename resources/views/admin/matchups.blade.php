@extends('layouts.app')
@section('css-imports')
    <link href="/css/jquery-ui.css" rel="stylesheet" >
@endsection
@section('js-imports')
    <script src="/js/jquery-ui.js" defer></script>
@endsection
@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
		use App\Models\team;
		use App\Models\division;
    @endphp
    <main id="admin-matchups" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Match-ups Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Match-up added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Match-up edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Match-up is not empty, delete games first</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'double-error')
                        <p class="operation-result error"><strong>Team 1&nbsp;</strong> and&nbsp; <strong>Team 2&nbsp;</strong> must be different teams, please try again</p>
                    @endif
                    @if(session('message') == 'division-error')
                        <p class="operation-result error">Teams belong to different divisions, please try again</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Match-up removed</p>
                    @endif
                    @if(session('message') == 'clear')
                        <p class="operation-result">Match-ups Cleared</p>
                    @endif
                    <h3 class="mtop60">Add new Match-up</h3>
                    <form action="/admin-matchup-add" method="post">
                        @csrf
                        <label for="new-matchup-team1">Team 1</label>
                        <select name="team1_id" id="new-matchup-team1" required>
                            <option value="">--- Select a team ---</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>
                        <label for="new-matchup-team2">Team 2</label>
                        <select name="team2_id" id="new-matchup-team2" required>
                            <option value="">--- Select a team ---</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="team1_score" value="0">
                        <input type="hidden" name="team2_score" value="0">

                        <label for="new-matchup-round">Round</label>
                        <input type="number" min="1" step="1" max="16" name="round" id="new-matchup-round" required>


                        <button type="submit">Add</button>
                    </form>
                    <h3 class="mtop60">Clear Match-ups</h3>
                    <form action="/admin-matchup-clear" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR MATCH-UPS??? \n\r There is no going back!')">
                        <p><strong>Warning:</strong> This will clear ALL match-ups. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                        @csrf
                        <button type="submit" class="delete d-inline">!!! CLEAR MATCH-UPS !!!</button>
                    </form>
                    <h3 class="mtop60">Edit Match-ups</h3>
                    <ul>
                        @if($matchups->count() == 0)
                            <li><p class="text-center">No games are present yet.</p></li>
                        @endif
                        @foreach($matchups as $matchup)
                            <li>
                                <h4 class="admin-toggle"><i class="fa fa-chevron-down"></i> <strong>{{ division::where('id', $matchup->division_id)->first()->division_name . '-' . $matchup->round }}</strong>: <span class="accent">{{ team::where('id', $matchup->team1_id)->first()->team_name }} </span> <b class="small">vs</b> <span class="accent"> {{ team::where('id', $matchup->team2_id)->first()->team_name }}</span></h4>
                                <div>
                                <form class="mbot0 mtop0" action="/admin-matchup-edit" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $matchup->id }}" name="id">
                                    <div class="row">
                                        <div class="col">
                                            <label for="edit-matchup-team1-{{ $matchup->id }}">Team 1</label>
                                            <select class="w100" name="team1_id" id="edit-matchup-team1-{{ $matchup->id }}" required>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="edit-matchup-score1-{{ $matchup->id }}">Team 1 Score</label>
                                            <input id="edit-matchup-score1-{{ $matchup->id }}" type="number" max="3" min="0" step="1" name="team1_score" value="{{ $matchup->team1_score }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="edit-matchup-team2-{{ $matchup->id }}">Team 2</label>
                                            <select class="w100" name="team2_id" id="edit-matchup-team2-{{ $matchup->id }}" required>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="edit-matchup-score2-{{ $matchup->id }}">Team 2 Score</label>
                                            <input id="edit-matchup-score2-{{ $matchup->id }}" type="number" max="3" min="0" step="1" name="team2_score" value="{{ $matchup->team2_score }}">
                                        </div>
                                    </div>

                                    <br>
                                    <label for="edit-matchup-round-{{ $matchup->id }}">Round</label>
                                    <input type="number" value="{{ $matchup->round }}" min="1" step="1" max="16" name="round" id="edit-matchup-round-{{ $matchup->id }}">

                                    <div class="row">
                                        <div class="col">
                                            <label for="edit-matchup-calendar-{{ $matchup->id }}">Date</label>
                                            <input name="date" type="text" id="edit-matchup-calendar-{{ $matchup->id }}" class="datepicker-ui" value="{{ explode(',', $matchup->calendar)[0] }}">
                                        </div>
                                        <div class="col">
                                            <label for="edit-matchup-time-{{ $matchup->id }}">Time (UTC)</label>
                                            <input type="time" name="time" id="edit-matchup-time-{{ $matchup->id }}" value="{{ substr(trim(explode(',', $matchup->calendar)[1] ?? ""), 0, -5) }}">
                                        </div>
                                    </div>

                                    <label for="edit-matchup-bracket-{{ $matchup->id }}">Bracket (Bracket names in Tournament mode)</label>
                                    <input type="text" size="64" name="bracket" id="edit-matchup-bracket-{{ $matchup->id }}">



                                    <button type="submit">Edit</button>

                                </form>

                                <form class="mtop0" action="/admin-matchup-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this matchup?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $matchup->id }}">
                                    <button class="delete" type="submit">Delete</button>
                                </form>

                                <script>
                                    document.getElementById('edit-matchup-team1-{{ $matchup->id }}').value = "{{ $matchup->team1_id }}";
                                    document.getElementById('edit-matchup-team2-{{ $matchup->id }}').value = "{{ $matchup->team2_id }}";
                                </script>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
