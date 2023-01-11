@extends('layouts.app')

@section('content')
    <main id="teams">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Current Season Teams</h2>
                    @if($season != '')
                        @if ($season->show === 1)
                            @if (count($division) > 0)
                                <ul class="card-like">
                                @foreach($division as $div)
                                    @php
                                        $teams = App\Models\team::where('division_id', $div->id)->get();
                                    @endphp
                                        @foreach($teams as $item)
                                            @php
                                                $pilots = App\Models\pilot::where('team_id', $item->id)->get();
                                            @endphp
                                            <li><img src="/images/teams/{{ $item->logo != "" ? $item->logo : 'default.png' }}" alt="{{ $item->team_name }} logo"><h3>{{ $item->team_name }}
                                                    <span class="club">{{ $item->club }}</span>
                                                    @if($div->division_name != NULL)
                                                    <span class="sub-info">{{ $div->division_name }} Division</span>
                                                    @endif
                                                </h3>
                                                <ul>
                                                    @foreach($pilots as $pilot)
                                                        <li><a href="pilots#{{ $pilot->pilot_name }}">[{{ $item->initials }}] <strong>{{ $pilot->pilot_name }}</strong></a>
                                                        {!! App\Models\pilotStat::where('pilot_id', $pilot->id)->count() ? '<i class="fa fa-lock" title="This player is locked in this team."></i>' : '' !!}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                @endforeach
                                </ul>
                            @endif
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
