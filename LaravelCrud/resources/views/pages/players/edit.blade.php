@extends('master.main')

@section('content')

    @component('players.player-form-edit', ['player' => $player])
    @endcomponent

@endsection
