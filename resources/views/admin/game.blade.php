@extends('layouts.app')

@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
		use App\Models\team;
		use App\Models\division;
    @endphp
    <main id="admin-game" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Games Panel</h2>
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
                    @if(session('message') == 'errors')
                        <p class="operation-result error">Games are not empty, delete pilot stats first</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Game removed</p>
                    @endif
                    @if(session('message') == 'clear')
                        <p class="operation-result">Games Cleared</p>
                    @endif
                    <h3 class="mtop60">Clear Games</h3>
                    <form action="/admin-game-clear" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR GAMES??? \n\r There is no going back!')">
                        <p><strong>Warning:</strong> This will clear ALL games. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                        @csrf
                        <button type="submit" class="delete d-inline">!!! CLEAR GAMES !!!</button>
                    </form>
                    <h3 class="mtop60">Edit Games</h3>
                    <ul class="">
                        @if($games->count() == 0)
                            <li><p class="text-center">No games are present yet.</p></li>
                        @endif
                        @foreach($games as $game)
                            <li>
                                <h4 class="admin-toggle"><i class="fa fa-chevron-down"></i> {{ $game->match_round }}</h4>
                                        <div>
                                            <form class="mbot0 mtop0" action="/admin-game-update" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $game->id }}">

                                                <label for="edit-game-name-{{ $game->id }}">Game Name</label>
                                                <input type="text" maxlength="64" name="match_round"
                                                       id="edit-game-name-{{ $game->id }}" value="{{ $game->match_round }}" required>

                                                <label for="edit-matchup-id-{{ $game->id }}">Matchup</label>
                                                <select name="matchup_id" id="edit-matchup-id-{{ $game->id }}" required>
                                                    @foreach($matchups as $mu)
                                                        <option value="{{ $mu->id }}">{{ division::where('id', $mu->division_id)->first()->division_name  }}, R{{$mu->round}}: {{ team::where('id', $mu->team1_id)->first()->team_name }} vs {{ team::where('id', $mu->team2_id)->first()->team_name }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="edit-game-number-{{ $game->id }}">Game Number</label>
                                                <input type="number" name="game" min="1" max="5" step="1" value="{{ $game->game }}" id="edit-game-number-{{ $game->id }}">

                                                <label for="edit-game-map-{{ $game->id }}">Map</label>
                                                <select name="map" id="edit-game-map-{{ $game->id }}">
                                                    <option value="Fostar Haven">Fostar Haven</option>
                                                    <option value="Galitan">Galitan</option>
                                                    <option value="Esseles">Esseles</option>
                                                    <option value="Nadiri Dockyards">Nadiri Dockyards</option>
                                                    <option value="Sissubo">Sissubo</option>
                                                    <option value="Yavin Prime">Yavin Prime</option>
                                                    <option value="Zavian Abyss">Zavian Abyss</option>
                                                </select>

                                                <label for="edit-game-faction-{{ $game->id }}">Faction (Team 1)</label>
                                                <select name="faction" id="edit-game-faction-{{ $game->id }}">
                                                    <option value="0">New Republic</option>
                                                    <option value="1">Galactic Empire</option>
                                                </select>

                                                <button type="submit">Edit</button>
                                                <script>
                                                    document.getElementById('edit-matchup-id-{{ $game->id }}').value = "{{ $game->matchup_id }}";
                                                    document.getElementById('edit-game-map-{{ $game->id }}').value = "{{ $game->map }}";
                                                    document.getElementById('edit-game-faction-{{ $game->id }}').value = "{{ $game->faction }}";
                                                </script>
                                            </form>

                                            <form class="mtop0 mbot0 ptop0" action="/admin-game-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this game?')">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $game->id }}">
                                                <button class="delete" type="submit">Delete</button>

                                            </form>
                                        </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
