@extends('layouts.layout')

@section('title', '名刺-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の名刺-登録 】</h1>
    <br>
    <br>
    @include('forms._businessCard_form', [
        'action' => route('business-card.add', ['corp' => $corp]),
        'backUrl' => route('corp.businessCardsList', ['corp' => $corp]),
        'buttonLabelValue' => '名刺一覧へ戻る',
    ])
    <br>
    <br>

    <script src="{{ asset('js/business-card.js') }}"></script>
@endsection
