@extends('master.main')
@section('content')
    <div class="table">
        <h1 class="text-center">PLAYERS</h1>
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
                <th scope="col">Image</th>
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
                    <td>
                        @if ($player->image)
                            <img class="w-100 img-responsive" src="{{ asset('storage/'.$player->image) }}" alt="" title=""></a>
                        @else
                            <p>
                                No Image
                            </p>
                        @endif
                    </td>
                    <td> {{$player->name}}</td>
                    <td> {{$player->address}}</td>
                    <td>@if ($player->retired)

                            <i class="bi bi-emoji-smile"></i>

                        @else

                            <i class="bi bi-emoji-smile-upside-down-fill"></i>

                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{url('players/' . $player->id)}}" class="mr-3"><button type="button" class="btn btn-secondary"> Show </button></a>
                        <p></p>
                        <a href="{{url('players/' . $player->id . '/edit')}}" type="button"class="btn btn-secondary mr-3">Edit</a>
                        <p></p>
                        <form action="{{url('players/' . $player->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-around">
            {{$players->links()}}

            <form action="{{url('players/truncate')}}" method="GET">
                <button type="submit" class="btn btn-danger">Delete All Players</button>
            </form>
        </div>

        <form class="btn btn-dark" action="{{url('players/import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Import Players</button>
        </form>

        <form action="{{url('players/export')}}">
            <button type="submit" class="btn btn-primary">Export Players</button>
        </form>

        <form action="{{url('players/truncate')}}" method="GET">
            <button type="submit" class="btn btn-danger">Delete Players</button>
        </form>

    </div>
@endsection
<script>
    import {App} from "../../../public/js/app";
    export default {
        components: {App}
    }
</script>
