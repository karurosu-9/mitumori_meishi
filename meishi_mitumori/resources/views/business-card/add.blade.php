@extends('layouts.layout')

@section('title', '名刺-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} への名刺-登録 】</h1>
    <br>
    <br>
    @include('forms._businessCard_form', [
        'action' => route('business-card.create', $corp),
        'backUrl' => route('corp.list'),
    ])
    <br>
    <br>

    <script src="{{ asset('js/business-card.js') }}"></script>
@endsection
