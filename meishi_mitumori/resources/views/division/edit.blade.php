@extends('layouts.layout')

@section('title', '部署-編集')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 部署-編集 】</h1>
    <br>
    <br>
    @include('form._division_form', [
        'action' => 'edit',
        'backUrl' => route('corp.show'),
        'submitButtonLabel' => '編集',
    ])
    <br>
    <br>

    <script src="{{ asset('js/division.js') }}"></script>

@endsection
