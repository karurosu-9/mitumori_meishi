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
    <form class="h-adr" action="{{ route('corp.add') }}" method="POST" onsubmit="return formCheckMessage()">
        @csrf
        @include('forms._corp_form', [
            'backUrl' => route('corp.list'),
            'buttonLabelValue' => '会社一覧へ戻る',
        ])
    </form>
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ asset('js/corp.js') }}"></script>

@endsection
