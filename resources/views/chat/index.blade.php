@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Contato</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chats as $chat)
                    <tr>
                        <td><a href="{{ route('chat.dialog', ['id' => $chat['to']]) }}">{{ $chat['name'] }}</a></td>
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