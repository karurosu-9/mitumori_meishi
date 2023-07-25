@extends('layouts.layout')

@section('title', '会社-詳細')

@section('content')

@endsection
<br>
<br>
<br>
<h1>【 {{ $businessCard->corp->corp_name }} - 名刺詳細 】</h1>
<br>
<br>
<div class="button">
    <button
        onclick="location.href='{{ route('corp.businessCardsList', ['corp' => $businessCard->corp->id]) }}'">名刺一覧</button>
</div>
<br>
<br>
<table cellpadding="1">
    <tr>
        <th>名刺番号</th>
        <td>{{ $businessCard->id }}</td>
    </tr>
    <tr>
        <th>会社名</th>
        <td>{{ $businessCard->corp->corp_name }}</td>
    </tr>
    <tr>
        <th>所属部署</th>
        <td>{{ $businessCard->division }}</td>
    </tr>
    <tr>
        <th>役職</th>
        <td>{{ $businessCard->title ? $businessCard->title : '――' }}</td>
    </tr>
    <tr>
        <th>名前</th>
        <td>{{ $businessCard->employee_name }}</td>
    </tr>
    <tr>
        <th>郵便番号</th>
        <!-- ハイフン入りの郵便番号 -->
        <td>〒{{ $postalCode }}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{ $businessCard->corp->address }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{ $businessCard->corp->tel }}</td>
    </tr>
    <tr>
        <th>携帯番号</th>
        <td>{{ $businessCard->mobile_phone }}</td>
    </tr>
</table>
<br>
<br>
<div class="button">
    <button
        onclick="editBusinessCard('{{ route('business-card.edit', ['corp' => $corp, 'businessCard' => $businessCard]) }}')">編集</button>
    <button
        onclick="deleteBusinessCard(event, '{{ route('business-card.delete', ['corp' => $corp, 'businessCard' => $businessCard]) }}')"
        data-corp-name='{{ $businessCard->corp->corp_name }}'
        data-business-card-id='{{ $businessCard->id }}'>削除</button>
</div>

<script src="{{ asset('js/business-card.js') }}"></script>
