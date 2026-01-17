@extends('layouts.app')

@section('content')
    @php
    if (!isset($_SESSION['message'])) {
		$_SESSION['message'] = "";
    }
    @endphp
    <main id="admin-seasons" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Seasons Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Season added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Season edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Season is not empty, delete divisions first</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Season removed</p>
                    @endif
                    @if ($seasons->count() == 0)
                    <h3 class="mtop60">Add new Season</h3>
                    <form action="/admin-season-add" method="post">
                        @csrf
                        <label for="new-season-name">Season Name</label>
                        <input type="text" maxlength="64" name="season_name" id="new-season-name" required>

                        <label for="new-season-type">Type</label>
                        <select name="type" id="new-season-type" required>
                            <option value="">--- Select a value ---</option>
                            <option value="league">League</option>
                            <option value="tourney">Tournament</option>
                        </select>
                        <input type="hidden" name="rounds" value="1">
                        <input type="hidden" name="show" value="0">
                        <button type="submit">Add</button>
                    </form>
                    @else
                    <h3 class="mtop60">Edit Seasons</h3>
                    <ul>
                        @foreach($seasons as $season)
                            <li>
                                <form class="mbot0" action="/admin-season-edit" method="post">
                                    @csrf
                                    <label for="edit-season-name-{{ $season->id }}">Season Name</label>
                                    <input type="text" maxlength="64" name="season_name" id="edit-season-name-{{ $season->id }}" value="{{ $season->season_name }}" required>

                                    <label for="edit-season-type-{{ $season->id }}">Type</label>
                                    <select name="type" id="edit-season-type-{{ $season->id }}">
                                        <option value="league">League</option>
                                        <option value="tourney">Tournament</option>
                                    </select>
                                    <input type="hidden" name="rounds" value="1">
                                    <input type="hidden" name="id" value="{{ $season->id }}">

                                    <label for="edit-season-show-{{ $season->id }}">Show Season?</label>
                                    <select name="show" id="edit-season-show-{{ $season->id }}">
                                        <option value="0">Hidden!</option>
                                        <option value="1">Show!</option>
                                    </select>
                                    <button type="submit">Edit</button>
                                    <script>
                                        document.getElementById('edit-season-type-{{ $season->id }}').value = "{{ $season->type }}";
                                        document.getElementById('edit-season-show-{{ $season->id }}').value = "{{ $season->show }}";
                                    </script>
                                </form>
                                <form class="mtop0" action="/admin-season-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this season?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $season->id }}">
                                    <button class="delete" type="submit">Delete</button>

                                </form>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
