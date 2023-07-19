@extends('layouts.layout')

@section('title', '会社-登録')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 会社-登録 】</h1>
    <br>
    <br>
    @include('forms._corp_form', [
        'action' => route('corp.add'),
        'backUrl' => route('corp.list'),
    ])
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ asset('js/corp.js') }}"></script>

@endsection
