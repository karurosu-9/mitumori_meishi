@extends('layouts.layout')

@section('title', '名刺-登録')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 名刺-登録 】</h1>
    <br>
    <br>
    <form action="{{ route('businessCard.add') }}" method="POST" onsubmit="return addCheckMessage()">
        <select name="select_corp">
            @foreach ($corps as $corp)
                    <option value="{{ $corp->id }}">{{ $corp->corp_name }}</option>
            @endforeach
        </select>
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
