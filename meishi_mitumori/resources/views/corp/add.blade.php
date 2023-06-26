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
    <form action="{{ route('corp.add') }}" class="h-adr" method="POST" onsubmit="return addCheckMessage()">
    @include('forms._corp_form', ['action' => 'add'])
    <br>
    <br>
    <div class="button">
        <button onclick="location.href='{{ route('corp.list') }}'">戻る</button>
        <input type="submit" value="登録">
    </div>
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ asset('js/corp.js') }}"></script>

@endsection
