@extends('master.main')
@section('content')
    <div class="table">
        <h1>Players</h1>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Retired</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr>
                    <td> {{$player->id}}</td>
                    <td> {{$player->name}}</td>
                    <td> {{$player->address}}</td>
                    <td>@if ($player->retired)

                            <i class="bi bi-emoji-smile"></i>

                        @else

                            <i class="bi bi-emoji-smile-upside-down-fill"></i>

                        @endif
                    </td>
                    <td><a href="{{url('players/' . $player->id)}}"><button type="button" class="btn btn-light">Show</button></a>
                        <a href="{{url('players/' . $player->id . '/edit')}}" type="button"class="btn btn-light">Edit</a>
                        <form action="{{url('players/' . $player->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$players->links()}}

        <form class="btn btn-dark" action="{{url('players/import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Import Players</button>
            <a class="btn btn-light" href="{{url('players/export')}}"> Export Players</a>
            <form action="{{url('players/truncate')}}" method="GET"><button type="submit" class="btn btn-danger">Delete Players</button></form>
        </form>

    </div>
@endsection
<script>
    import {App} from "../../../public/js/app";
    export default {
        components: {App}
    }
</script>
