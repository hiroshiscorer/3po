@extends('layouts.app')

@section('content')
    @php
        if (!isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
    @endphp
    <main id="admin-divisions" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Divisions Panel</h2>
                    <p class="back-to-admin"><a href="/admin"><i class="fa fa-chevron-left"></i> Return to Admin</a></p>

                    @if(session('message') == 'add')
                        <p class="operation-result">Division added</p>
                    @endif
                    @if(session('message') == 'edit')
                        <p class="operation-result">Division edited</p>
                    @endif
                    @if(session('message') == 'error')
                        <p class="operation-result error">Division is not empty, delete matchups first</p>
                    @endif
                    @if(session('message') == 'data-error')
                        <p class="operation-result error">Data error, please try again</p>
                    @endif
                    @if(session('message') == 'delete')
                        <p class="operation-result">Division removed</p>
                    @endif

                    <h3 class="mtop60">Add new Division</h3>
                    <form action="/admin-division-add" method="post">
                        @csrf
                        <label for="new-division-name">Division Name</label>
                        <input type="text" maxlength="64" name="division_name" id="new-division-name" required>

                        <label>Season: {{ $season->season_name }}</label>
                        <input type="hidden" value="{{ $season->id }}" name="season_id">

                        <label for="rounds">Rounds (number of dates to be played)</label>
                        <input type="number" id="rounds" name="rounds" value="1" min="1" max="16" step="1">
                        <button type="submit">Add</button>
                    </form>

                    <h3 class="mtop60">Edit Divisions</h3>
                    <ul>
                        @foreach($divisions as $division)
                            <li>
                                <form class="mbot0" action="/admin-division-edit" method="post">
                                    @csrf
                                    <label for="edit-division-name-{{ $division->id }}">Division Name</label>
                                    <input type="text" maxlength="64" name="division_name" id="edit-division-name-{{ $division->id }}" value="{{ $division->division_name }}" required>

                                    <label>Season: {{ $season->season_name }}</label>
                                    <input type="hidden" name="season_id" value="{{ $division->season_id }}">


                                    <label for="rounds-{{ $division->id }}">Rounds (number of dates to be played)</label>
                                    <input type="number" id="rounds-{{ $division->id }}" name="rounds" value="{{ $division->rounds }}" min="1" max="16" step="1">

                                    <input type="hidden" name="id" value="{{ $division->id }}">

                                    <button type="submit">Edit</button>

                                </form>

                                <form class="mtop0" action="/admin-division-delete" method="post" onsubmit="return confirm('Are you sure you want to delete this division?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $division->id }}">
                                    <button class="delete" type="submit">Delete</button>
                                </form>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
