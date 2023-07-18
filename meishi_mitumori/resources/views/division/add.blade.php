@extends('layouts.layout')

@section('title', '部署-登録')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 部署-登録 】</h1>
    <br>
    <br>
    @include('form._division_form', [
        'action' => 'add',
        'backUrl' => route('corp.show'),
        'submitButtonLabel' => '登録',
    ])
    <br>
    <br>

    <script src="{{ asset('js/division.js') }}"></script>
    
@endsection
