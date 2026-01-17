@extends('layouts.app')

@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
    @endphp
    <main id="admin-pilot-stats" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Pilots Stats Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Pilot Stat added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Pilot Stat edited</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Pilot Stat removed</p>
                    @endif
                    @if(session('message') == 'clear')
                        <p class="operation-result">Pilot Stats Cleared</p>
                    @endif
                    <h3 class="mtop60">Add new Pilot Stat</h3>
                    <form action="/admin-pilot-stats-add" method="post">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label class="mtop0" for="add-stat-score">Score</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                       id="add-stat-score" name="score" value="0">
                            </div>
                            <div class="col">
                                <label class="mtop0" for="add-stat-kills">Kills</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                       id="add-stat-kills" name="kills" value="0">
                            </div>
                            <div class="col">
                                <label class="mtop0" for="add-stat-deaths">Deaths</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                       id="add-stat-deaths" name="deaths" value="0">
                            </div>
                            <div class="col">
                                <label class="mtop0" for="add-stat-assists">Assists</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                       id="add-stat-assists" name="assists" value="0">
                            </div>
                            <div class="col">
                                <label class="mtop0" for="add-stat-ai">AI Kills</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="add-stat-ai"
                                       name="ai" value="0">
                            </div>
                            <div class="col">
                                <label class="mtop0" for="add-stat-cap">Cap Ship Damage</label>
                                <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="add-stat-cap"
                                       name="cap" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="add-stat-pilot">Pilot</label>
                                <select class="w100" name="pilot_id" id="add-stat-pilot" required>
                                    <option value="">--- Select a Pilot ---</option>
                                    @foreach($pilots as $pilot)
                                        <option value="{{ $pilot->id }}">{{ $pilot->pilot_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="add-stat-game">Game</label>
                                <select class="w100" name="game_id" id="add-stat-game" required>
                                    <option value="">--- Select a Game ---</option>
                                    @foreach($games as $game)
                                        <option value="{{ $game->id }}">{{ $game->match_round }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="add-stat-winstate">Win State</label>
                                <select class="w100" name="winstate" id="add-stat-winstate" required>
                                    <option value="">--- Select a win state ---</option>
                                    <option value="win">Game Won</option>
                                    <option value="draw">Game Tied</option>
                                    <option value="lose">Game Lost</option>
                                </select>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="d-inline">Add</button>
                            </div>
                        </div>
                    </form>
                    <h3 class="mtop60">Clear Pilot Stats</h3>
                    <form action="/admin-pilot-stats-clear" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR PILOT STATS??? \n\r There is no going back!')">
                        <p><strong>Warning:</strong> This will clear ALL pilot stats. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                        @csrf
                        <button type="submit" class="delete d-inline">!!! CLEAR PILOT STATS !!!</button>
                    </form>
                    <h3 class="mtop60">Edit Pilot Stats</h3>
                    <ul class="">
                        @if($games->count() == 0)
                            <li><p class="text-center">No Pilot Stats are present yet.</p></li>
                        @endif
                        @foreach($stats as $stat)
                            <li class="admin-minimum">
                                <form action="/admin-pilot-stats-edit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $stat->id }}">

                                    <div class="row">
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-score-{{ $stat->id }}">Score</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                                   id="edit-stat-score-{{ $stat->id }}" name="score" value="{{ $stat->score }}">
                                        </div>
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-kills-{{ $stat->id }}">Kills</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                                   id="edit-stat-kills-{{ $stat->id }}" name="kills" value="{{ $stat->kills }}">
                                        </div>
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-deaths-{{ $stat->id }}">Deaths</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                                   id="edit-stat-deaths-{{ $stat->id }}" name="deaths" value="{{ $stat->deaths }}">
                                        </div>
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-assists-{{ $stat->id }}">Assists</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off"
                                                   id="edit-stat-assists-{{ $stat->id }}" name="assists" value="{{ $stat->assists }}">
                                        </div>
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-ai-{{ $stat->id }}">AI Kills</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="edit-stat-ai-{{ $stat->id }}"
                                                   name="ai" value="{{ $stat->ai_kills }}">
                                        </div>
                                        <div class="col">
                                            <label class="mtop0" for="edit-stat-cap-{{ $stat->id }}">Cap Ship Damage</label>
                                            <input type="number" min="0" max="1000000" step="1" autocomplete="off" id="edit-stat-cap-{{ $stat->id }}"
                                                   name="cap" value="{{ $stat->cap_damage }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="edit-stat-pilot-{{ $stat->id }}">Pilot</label>
                                            <select class="w100" name="pilot_id" id="edit-stat-pilot-{{ $stat->id }}" required>
                                                @foreach($pilots as $pilot)
                                                    <option value="{{ $pilot->id }}">{{ $pilot->pilot_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <label for="edit-stat-game-{{ $stat->id }}">Game</label>
                                            <select class="w100" name="game_id" id="edit-stat-game-{{ $stat->id }}" required>
                                                @foreach($games as $game)
                                                    <option value="{{ $game->id }}">{{ $game->match_round }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <label for="edit-stat-winstate-{{ $stat->id }}">Win State</label>
                                            <select class="w100" name="winstate" id="edit-stat-winstate-{{ $stat->id }}" required>
                                                <option value="win">Game Won</option>
                                                <option value="draw">Game Tied</option>
                                                <option value="lose">Game Lost</option>
                                            </select>
                                        </div>
                                        <div class="col-3" style="display: flex; align-items: flex-end">

                                            <button class="w100" type="submit">Edit</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById('edit-stat-pilot-{{ $stat->id }}').value = "{{ $stat->pilot_id }}";

                                    document.getElementById('edit-stat-game-{{ $stat->id }}').value = "{{ $stat->match_id }}";

                                    @if($stat->match_won == 1)
                                        document.getElementById('edit-stat-winstate-{{ $stat->id }}').value = "win";
                                    @endif
                                    @if($stat->match_tied == 1)
                                        document.getElementById('edit-stat-winstate-{{ $stat->id }}').value = "draw";
                                    @endif
                                    @if($stat->match_lost == 1)
                                        document.getElementById('edit-stat-winstate-{{ $stat->id }}').value = "lose";
                                    @endif

                                </script>
                                <form action="admin-pilot-stats-delete" method="post" class="stat-add-on" onsubmit="return confirm('Do you really want to delete this stat block?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $stat->id }}">
                                    <button type="submit"  class="delete">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
