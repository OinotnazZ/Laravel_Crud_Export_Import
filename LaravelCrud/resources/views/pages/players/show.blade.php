@extends('master.main')

@section('content')

    @component('players.player-form-show', ['player' => $player])
    @endcomponent

@endsection
