@extends('master.main')
@section('content')
    @component('players.player-list', ['players' => $players])
    @endcomponent
@endsection
