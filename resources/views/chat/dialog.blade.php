@extends('layouts.app')

@section('style')
    <style type="text/css">
        .blue { background: blue }
        .grey { background: grey }
        .chats-row { height: 100vh; }
        .chats-row div {
            height: 50%;
            border: 1px solid #ddd;
            padding: 0px;
        }

        .list-group-item {
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;

        }
        .list-group-item:first-child {
            border-top: none;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }


        .current-chat {
            height: 100vh;
            border: 1px solid #ddd;
        }

        .chat-toolbar-row {
            background-color: #f5f5f5;
        }

        .chat-toolbar {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .current-chat-area {
            padding-top: 10px;
            overflow: auto;
            height: 85vh;
        }

        .current-chat-footer {
            position: absolute;
            bottom: 0;

        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $with->name }}</h1>
            </div>
            <div class="col-md-6">
                <h3>
                    @if($with->status)
                        Online
                    @else
                        Offline
                    @endif
                </h3>
            </div>
        </div>
        <div class="row current-chat-area">
            <div class="col-md-12">
                <ul class="media-list" id="dialog-area">
                    @foreach($messages as $message)
                            <li class="media">
                                <div class="media-body">
                                    <div class="media">
                                        <div class="media-body @if($message->from == Auth::user()->id) text-right @endif">
                                            {{ $message->content }}
                                            <br>
                                            <small class="text-muted">{{ $message->username() }}</small>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <footer class="navbar navbar-default navbar-fixed-bottom" style="background-color: #b2c3c7">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 0.5%;">
                        <div class="input-group">
                            <input type="text" id="message" class="form-control" placeholder="Digite uma mensagem" aria-describedby="sizing-addon3">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" id="send">
                                    <i class="glyphicon glyphicon-send"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        // Envio de mensagens
        $(document).ready(function () {

            $('#send').on('click', function () {
                let message;
                message = $('#message').val();

                let from;
                from = parseInt("{{ Auth::user()->id }}");

                let to;
                to = parseInt("{{ $with->id }}");

               if(message.length === 0){
                   return;
               }

               $.ajax({
                   type: "POST",
                   url: "{{ route('message.post') }}",
                   data: {
                       _token: "{{ csrf_token() }}",
                       content: message,
                       from: from,
                       to: to,
                   },
                   success: function (e) {
                       var content = '<li class="media"><div class="media-body"><div class="media">';
                       content += '<div class="media-body text-right">';
                       content += e.content;
                       content += '<br>';
                       content += '<small class="text-muted">' + "{{ Auth::user()->name }}" + '</small>';
                       content += '<hr>';
                       content += '</div></div></div></li>';

                       $('#message').value = '';

                       $('#dialog-area').append(content);
                   },
                   error: function (e) {
                       console.log(e);
                   }
               })

            });
        });

        // Recebimento
        Echo.private('message.{{ Auth::user()->id }}')
            .listen('MessageReceived', (e) => {
                var content = '<li class="media"><div class="media-body"><div class="media">';
                content += '<div class="media-body">';
                content += e.message.content;
                content += '<br>';
                content += '<small class="text-muted">' + e.message.user + '</small>';
                content += '<hr>';
                content += '</div></div></div></li>';

                $('#dialog-area').append(content);
            });

    </script>
@endsection