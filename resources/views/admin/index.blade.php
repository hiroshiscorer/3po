@extends('layouts.app')

@section('content')
    <main id="admin-main" class="admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Admin Panel</h2>

                    <ul class="admin-menu">
                        <li><a href="/admin-season">Seasons</a></li>
                        <li><a href="/admin-division">Divisions</a></li>
                        <li><a href="/admin-team">Teams</a></li>
                        <li><a href="/admin-pilot">Pilot</a></li>
                        <li><a href="/admin-matchup">Match-ups</a></li>
                        <li><a class="special" href="/admin-report">Report Games</a></li>
                        <li><a href="/admin-game-edit">Edit Games</a></li>
                        <li><a href="/admin-pilot-stats">Edit Pilot Stats</a></li>
                        <li><a href="/get-archive" target="_blank">Get Archive <i class="fa fa-external-link"></i> </a></li>
                        <li><a href="/get-sql" target="_blank">Get SQL <i class="fa fa-external-link"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
