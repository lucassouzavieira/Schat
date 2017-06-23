@extends('layouts.app')

@section('style')
    <style type="text/css">
    .bs-callout {
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #eee;
    border-left-width: 5px;
    border-radius: 3px;
    }
    .bs-callout h4 {
    margin-top: 0;
    margin-bottom: 5px;
    }
    .bs-callout p:last-child {
    margin-bottom: 0;
    }
    .bs-callout code {
    border-radius: 3px;
    }
    .bs-callout+.bs-callout {
    margin-top: -5px;
    }
    .bs-callout-default {
    border-left-color: #777;
    }
    .bs-callout-default h4 {
    color: #777;
    }
    .bs-callout-primary {
    border-left-color: #428bca;
    }
    .bs-callout-primary h4 {
    color: #428bca;
    }
    .bs-callout-success {
    border-left-color: #5cb85c;
    }
    .bs-callout-success h4 {
    color: #5cb85c;
    }
    .bs-callout-danger {
    border-left-color: #d9534f;
    }
    .bs-callout-danger h4 {
    color: #d9534f;
    }
    .bs-callout-warning {
    border-left-color: #f0ad4e;
    }
    .bs-callout-warning h4 {
    color: #f0ad4e;
    }
    .bs-callout-info {
    border-left-color: #5bc0de;
    }
    .bs-callout-info h4 {
    color: #5bc0de;
    }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="bs-callout bs-callout-success">
                <h4>{{ $online }}</h4>
                Usuários on-line
            </div>
        </div>
        <div class="col-md-4">
            <div class="bs-callout bs-callout-success">
                <h4>{{ $messages }}</h4>
                Mensagens trocadas.
            </div>
        </div>
        <div class="col-md-4">
            <div class="bs-callout bs-callout-success">
                <h4>{{ $rooms }}</h4>
                Salas criadas.
            </div>
        </div>
    </div>
</div>
@endsection
