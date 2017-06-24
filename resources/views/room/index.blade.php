@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="{{ route('room.create') }}">Nova sala</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Tópico</th>
                        <th>Capacidade</th>
                        <th>Online</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td><a href="{{ route('room.join', ['id' => $room->id]) }}">{{ $room->name }}</a></td>
                            <td>{{ $room->topic }}</td>
                            <td>{{ $room->users }}</td>
                            <td>{{ $room->online }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        window.Echo.private(`users.online`)
            .listen('UserOnline', (e) => {
                console.log(e.update);
            });
    </script>
@endsection