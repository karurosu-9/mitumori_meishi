@extends('layouts.layout')

@section('title', '会社-詳細')

@section('content')

@endsection
<br>
<br>
<br>
<br>
<h1>【 {{ $corp->corp_name }}-詳細 】</h1>
<br>
<br>
<button onclick="location.href='{{ route('corp.businessCardsList', ['corp' => $corp]) }}'">名刺一覧へ</button>
<br>
<br>
<table cellpadding="1">
    <tr>
        <th>会社名</th>
        <td>{{ $corp->corp_name }}</td>
    </tr>
    <tr>
        <th>郵便番号</th>
        <td>{{ $postalCode }}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{ $corp->address }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $corp->tel }}</td>
    </tr>
</table>
<br>
<br>
<div class="button">
    <button onclick="location.href='{{ route('corp.edit', ['corp' => $corp]) }}'">編集</button>
    <button onclick="confirmDelete('{{ route('corp.delete', ['corp' => $corp]) }}')">削除</button>
</div>
<script src="{{ asset('js/corp.js') }}"></script>
