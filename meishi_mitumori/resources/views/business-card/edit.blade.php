@extends('layouts.layout')

@section('title', '名刺-編集')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の名刺-編集 】</h1>
    <br>
    <br>
    <form action="{{ route('business-card.edit', ['corp' => $corp, 'businessCard' => $businessCard]) }}" method="POST"
        onsubmit="formCheckMessage()">
        @csrf
        @include('forms._businessCard_form', [
            'backUrl' => route('corp.businessCardsList', [$corp]),
            'buttonLabelValue' => '名刺詳細へ戻る',
        ])
    </form>
    <br>
    <br>

    <script src="{{ asset('js/business-card.js') }}"></script>
@endsection
