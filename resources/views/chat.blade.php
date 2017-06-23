<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Schat chat room</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <h1>Chat room</h1>
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messageSent="addMessage"></chat-composer>
</div>
<script src="{{ 'js/app.js' }}" charset="utf-8"></script>
</body>
</html>