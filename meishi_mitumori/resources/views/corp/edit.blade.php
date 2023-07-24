@extends('layouts.layout')

@section('title', '会社-編集')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 会社-編集 】</h1>
    <br>
    @include('forms._corp_form', [
        'action' => route('corp.edit', ['corp' => $corp]),
        'backUrl' => route('corp.show', ['corp' => $corp]),
        'buttonLabelValue' => '会社詳細へ戻る'
    ])
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ asset('js/corp.js') }}"></script>

@endsection
