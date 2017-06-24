@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Criar nova sala</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('room.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nome da Sala</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                                <label for="topic" class="col-md-4 control-label">Tópico</label>
                                <div class="col-md-6">
                                    <input id="topic" type="text" class="form-control" name="topic" value="{{ old('topic') }}" required>

                                    @if ($errors->has('topic'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('topic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                                <label for="users" class="col-md-4 control-label">Quantidade máxima de usuários</label>

                                <div class="col-md-6">
                                    <input id="users" type="number" class="form-control" name="users" required>

                                    @if ($errors->has('users'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('users') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Criar sala
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
