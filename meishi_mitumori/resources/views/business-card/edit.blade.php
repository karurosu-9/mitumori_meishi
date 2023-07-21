@extends('layouts.layout')

@section('title', '名刺-編集')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の名刺-編集 】</h1>
    <br>
    <br>
    @include('forms._businessCard_form', [
        'action' => route('business-card.edit', ['corp' => $corp, 'businessCard' => $businessCard]),
        'backUrl' => route('corp.businessCardsList', [$corp]),
        'buttonLabelValue' => '名刺詳細へ戻る',
    ])
    <br>
    <br>

    <script src="{{ asset('js/business-card.js') }}"></script>
@endsection
