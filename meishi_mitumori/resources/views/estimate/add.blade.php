@extends('layouts.layout')

@section('title', '見積り-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の見積り-登録 】</h1>
    <br>
    <br>
    <form action="{{ route('estimate.add', ['corp' => $corp]) }}" method="POST" onsubmit="return formCheckMessage()">
        @csrf
        @include('forms._estimate_form', [
            'backUrl' => route('estimate.corpEstimateList', ['corp' => $corp]),
            'buttonLabelValue' => '見積り一覧へ戻る',
        ])
    </form>
    <br>
    <br>

    <script src="{{ asset('js/estimate.js') }}"></script>
@endsection
