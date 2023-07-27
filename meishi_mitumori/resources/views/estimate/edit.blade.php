@extends('layouts.layout')

@section('title', '見積り-編集')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の見積り-編集 】</h1>
    <br>
    <br>
    <form action="{{ route('estimate.editConfirmEstimate', ['corp' => $corp, 'estimate' => $estimate]) }}" method="POST"
        onsubmit="return formCheckMessage()">
        @csrf
        @method('PUT')
        @include('forms._estimate_form', [
            'backUrl' => route('estimate.corpEstimatesList', ['corp' => $corp]),
            'buttonLabelValue' => '見積り一覧へ戻る',
        ])
    </form>
    <br>
    <br>

    <script>
        const FORM_NOT_HOSOKU = {{ \App\Consts\EstimateFormCountConsts::FORM_NOT_HOSOKU }};
    </script>

    <script src="{{ asset('js/estimate.js') }}"></script>
@endsection
