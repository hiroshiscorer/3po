@extends('layouts.app')

@section('content')
    <main id="seasons">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">Seasons Archive</h2>
                    <ul class="numbered">
                    @foreach($archives as $arch)
                        <li>
                            <a href="archive/{{ $arch->id }}">{{ $arch->archive_name }}</a>
                        </li>
                    @endforeach
                    </ul>
                    <p class="mtop90">Currently there are pending seasons to be introduced in the system, they will be added shortly.</p>
                </div>
            </div>
        </div>
    </main>
@endsection

