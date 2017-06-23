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
                        <td>{{ $chat['name'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection