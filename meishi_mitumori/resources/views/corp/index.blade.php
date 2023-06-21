@extends('layouts.layout')

@section('title', '会社一覧')

@section('content')
<br>
<br>
<br>
<br>
<h1>会社一覧</h1>
<br>
<br>
<table cellpadding="1">
    <tr>
        <th>会社名</th>
        <th>住所</th>
        <th>電話番号</th>
    </tr>
    <tr>
        @foreach ($corps as $corp)
            <tr>
                <td><a href="{{ route('corp.show', ['corp' => $corp]) }}">{{ $corp->corp_name }}</a></td>
                <td>{{ $corp->address }}</td>
                <td>{{ $corp->tel }}</td>
            </tr>
        @endforeach
    </tr>
</table>
<br>
<br>
