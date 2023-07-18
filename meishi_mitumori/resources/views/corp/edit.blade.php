@extends('layouts.layout')

@section('title', '会社-詳細')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 会社-編集 】</h1>
    <br>
    <br>
    <form action="{{ route('corp.edit', $corp) }}" class="h-adr" method="POST" onsubmit="return addCheckMessage()">
    @include('forms._corp_form', ['action' => 'edit'])
    <br>
    <br>
    <div class="button">
        <button type="button" onclick="location.href='{{ route('corp.list') }}'">戻る</button>
        <input type="submit" value="編集">
    </div>
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ asset('js/corp.js') }}"></script>

@endsection
