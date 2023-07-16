@extends('layouts.layout')

@section('title', '名刺-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 名刺-登録 】</h1>
    <br>
    <br>
    <form action="{{ route('businessCard.add') }}" method="POST">
        @include('forms._businessCard_form', ['action' => 'add'])
        <br>
        <br>
        <div class="button">
            <button onclick="location.href='{{ route('corp.list') }}'">戻る</button>
            <input type="submit" value="登録">
        </div>
        <br>
        <br>
    </form>
@endsection
