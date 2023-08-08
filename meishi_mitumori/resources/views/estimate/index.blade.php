@extends('layouts.layout')

@section('title', '見積一覧')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} - 見積一覧 】</h1>
    <br>
    <br>
    <div class="button">
        <button onclick="location.href='{{ route('corp.list') }}'">会社一覧へ戻る</button>
        <button type="button" onclick="location.href='{{ route('estimate.add', ['corp' => $corp]) }}'">見積登録</button>
    </div>
    <br>
    <br>
    <br>
    <table cellpadding="1" id="business-cards-table">
        <tr>
            <th>見積No.</th>
            <th>日付</th>
        </tr>
        @foreach ($estimates as $estimate)
            <tr>
                <td><a
                        href="{{ route('estimate.show', ['corp' => $corp, 'estimate' => $estimate]) }}">{{ $estimate->id }}</a>
                </td>
                <td>{{ $estimate->date }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <br>
