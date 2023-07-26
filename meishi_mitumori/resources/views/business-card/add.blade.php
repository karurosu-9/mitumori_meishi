@extends('layouts.layout')

@section('title', '名刺-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の名刺-登録 】</h1>
    <br>
    <br>
    <form action="{{ route('business-card.add', ['corp' => $corp]) }}" method="POST" onsubmit="return formCheckMessage()">
        @csrf
        @include('forms._businessCard_form', [
            'backUrl' => route('business-card.corpBusinessCardsList', ['corp' => $corp]),
            'buttonLabelValue' => '名刺一覧へ戻る',
        ])
    </form>
    <br>
    <br>

    <script src="{{ asset('js/business-card.js') }}"></script>
@endsection
