@extends('layouts.layout')

@section('title', '会社-詳細')

@section('content')

@endsection
<br>
<br>
<br>
<h1>【 {{ $corp->corp_name }}-詳細 】</h1>
<br>
<br>
<div class="button">
    <button onclick="location.href='{{ route('corp.businessCardsList', ['corp' => $corp]) }}'">名刺一覧</button>
    <button onclick="location.href='{{ route('business-card.add', ['corp' => $corp]) }}'">名刺登録</button>
</div>
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
    <button type="button" onclick="location.href='{{ route('corp.list') }}'">戻る</button>
    <button onclick="editCorp('{{ route('corp.edit', ['corp' => $corp]) }}')">編集</button>
    <button onclick="deleteCorp(event, '{{ route('corp.delete', ['corp' => $corp]) }}')"
        data-corp-name='{{ $corp->corp_name }}'>削除</button>
</div>
<script src="{{ asset('js/corp.js') }}"></script>
