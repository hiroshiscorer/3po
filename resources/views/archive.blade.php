@extends('layouts.app')

@section('content')
    <main id="archive">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="title">{{ $archive->archive_name }}</h2>
                    {!! $archive->content !!}
                </div>
            </div>
        </div>
    </main>
@endsection
