@extends('layouts.app')

@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
    @endphp
    <main id="admin-teams" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Teams Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Team added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Team edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Team is not empty, delete pilots and match-ups first</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Team removed</p>
                    @endif
                    @if(session('message') == 'clear')
                        <p class="operation-result">Teams cleared</p>
                    @endif
                    <h3 class="mtop60">Add new Team</h3>
                    <form action="/admin-team-add" method="post">
                        @csrf
                        <label for="new-team-name">Team Name</label>
                        <input type="text" maxlength="64" name="team_name" id="new-team-name" required>

                        <label for="new-team-initials">Initials</label>
                        <input type="text" maxlength="5" name="initials" id="new-team-initials">

                        <label for="new-team-image">Logo Image</label>
                        <input type="text" maxlength="64" name="logo" id="new-team-image">

                        <label for="new-team-name">Club</label>
                        <input type="text" maxlength="64" name="club" id="new-team-club">

                        <label for="new-team-division">Division</label>
                        <select name="division_id" id="new-team-division" required>
                            <option value="">--- Select a value ---</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Add</button>
                    </form>
                    <h3 class="mtop60">Clear Teams</h3>
                    <form action="/admin-team-clear" method="post" class="text-center" onsubmit="return confirm('ARE YOU SURE YOU WANT TO CLEAR TEAMS??? \n\r There is no going back!')">
                        <p><strong>Warning:</strong> This will clear ALL teams. Only use this if you already have archived last season. There is no going back after this is executed.</p>
                        @csrf
                        <button type="submit" class="delete d-inline">!!! CLEAR TEAMS !!!</button>
                    </form><h3 class="mtop60">Edit Teams</h3>
                    <ul>
                        @if($teams->count() == 0)
                            <li><p class="text-center">No Teams are present yet.</p></li>
                        @endif
                        @foreach($teams as $team)
                            <li>
                                <h4 class="admin-toggle"><i class="fa fa-chevron-down"></i> {{ $team->team_name }}</h4>
                                <div>
                                <form class="mbot0 mtop0" action="/admin-team-edit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $team->id }}">

                                    <label for="edit-team-name-{{ $team->id }}">Team Name</label>
                                    <input type="text" maxlength="64" name="team_name"
                                           id="edit-team-name-{{ $team->id }}" value="{{ $team->team_name }}" required>

                                    <label for="edit-team-initials-{{ $team->id }}">Initials</label>
                                    <input type="text" maxlength="5" name="initials"
                                           id="edit-team-initials-{{ $team->id }}" value="{{ $team->initials }}">

                                    <label for="edit-team-image-{{ $team->id }}">Logo Image</label>
                                    <input type="text" maxlength="64" name="logo" id="edit-team-image-{{ $team->id }}"
                                           value="{{ $team->logo }}">

                                    <label for="edit-team-name-{{ $team->id }}">Club</label>
                                    <input type="text" maxlength="64" name="club"
                                           id="edit-team-club-{{ $team->id }}" value="{{ $team->club }}">

                                    <label for="edit-team-division-{{ $team->id }}">Division</label>
                                    <select name="division_id" id="edit-team-division-{{ $team->id }}" required>
                                        <option value="">--- Select a value ---</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit">Edit</button>
                                    <script>
                                        document.getElementById('edit-team-division-{{ $team->id }}').value = "{{ $team->division_id }}";
                                    </script>
                                </form>
                                <form class="mtop0" action="/admin-team-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this team?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $team->id }}">
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
