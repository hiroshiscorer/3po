@extends('layouts.app')

@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
    @endphp
    <main id="admin-pilots" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Pilots Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Pilot added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Pilot edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Pilot is not empty, delete pilot stats first</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'duplicate-warning')
                        <p class="operation-result">Pilot added. Some pilots were not added due to duplicity.</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Pilot removed</p>
                    @endif
                    @if(session('message') == 'clear')
                        <p class="operation-result">Pilots Cleared</p>
                    @endif
                    <h3 class="mtop60">Add new Pilot</h3>
                    <form action="/admin-pilot-add" method="post">
                        @csrf
                        <label for="new-pilot-name">Pilot Name (One pilot per line)</label>
                        <textarea maxlength="640" name="pilot_name" id="new-pilot-name" required rows="6"></textarea>

                        <label for="new-pilot-team">Team</label>
                        <select name="team_id" id="new-pilot-team" required>
                            <option value="">--- Select a value ---</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach
                        </select>

                        <button type="submit">Add</button>
                    </form>
                    <h3 class="mtop60">Clear Pilots</h3>
                    <form action="/admin-pilot-clear" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR PILOTS??? \n\r There is no going back!')">
                        <p><strong>Warning:</strong> This will clear ALL pilots. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                        @csrf
                        <button type="submit" class="delete d-inline">!!! CLEAR PILOTS !!!</button>
                    </form>
                    <h3 class="mtop60">Edit Pilots</h3>
                    <ul class="admin-condensed">
                        @if($pilots->count() == 0)
                            <li><p class="text-center">No Pilots are present yet.</p></li>
                        @endif
                        @foreach($teams as $team)
                            <li>
                                <h4 class="admin-toggle"><i class="fa fa-chevron-down"></i> {{ $team->team_name }}</h4>
                                @if(\App\Models\pilot::where('team_id', $team->id)->count() == 0)
                                    <div class="text-center">No Pilots are present for this team yet.</div>
                                @else
                                @foreach($pilots as $pilot)
                                    @if ($pilot->team_id == $team->id)
                                        <div>
                                <form class="mbot0 mtop0" action="/admin-pilot-edit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pilot->id }}">

                                    <label for="edit-pilot-name-{{ $pilot->id }}">Pilot Name</label>
                                    <input type="text" maxlength="64" name="pilot_name"
                                           id="edit-pilot-name-{{ $pilot->id }}" value="{{ $pilot->pilot_name }}" required>

                                    <label for="edit-pilot-team-{{ $pilot->id }}">Team</label>
                                    <select name="team_id" id="edit-pilot-team-{{ $pilot->id }}" required>
                                        @foreach($teams2 as $team2)
                                            <option value="{{ $team2->id }}">{{ $team2->team_name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit">Edit</button>
                                    <script>
                                        document.getElementById('edit-pilot-team-{{ $pilot->id }}').value = "{{ $pilot->team_id }}";
                                    </script>
                                </form>
                                <form class="mtop0 mbot0 ptop0" action="/admin-pilot-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this pilot?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pilot->id }}">
                                    <button class="delete" type="submit">Delete</button>

                                </form>
                                        </div>
                                    @endif
                                @endforeach
                                <div>

                                    <form action="/admin-pilot-clear-team" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR ALL PILOTS FOR {{ $team->team_name }}??? \n\r There is no going back!')">
                                        <input type="hidden" name="id" value="{{ $team->id }}">
                                        <h4 class="mtop0">Clear Pilots of this team</h4>
                                        <p><strong>Warning:</strong> This will clear ALL pilots for {{ $team->team_name }} team. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                                        @csrf
                                        <button type="submit" class="delete d-inline">!!! CLEAR {{ $team->team_name }} PILOTS !!!</button>
                                    </form>
                                </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
