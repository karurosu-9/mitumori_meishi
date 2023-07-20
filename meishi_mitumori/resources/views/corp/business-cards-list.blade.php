@extends('layouts.layout')

@section('title', '会社一覧')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} - 名刺一覧 】</h1>
    <br>
    <br>
    <div class="button">
        <button onclick="location.href='{{ route('corp.list') }}'">会社一覧へ戻る</button>
        <button type="button" onclick="location.href='{{ route('business-card.add', ['corp' => $corp]) }}'">名刺登録</button>
    </div>
    <br>
    <select id="select-division" class="select-box">
        <option value='' selected>-- 部署の絞り込み --</option>
        @foreach ($uniqueDivisions as $division)
            <option value="{{ $division }}">{{ $division }}</option>
        @endforeach
    </select>
    <br>
    <br>
    <table cellpadding="1" id="business-cards-table">
        <tr>
            <th>名刺番号</th>
            <th>会社名</th>
            <th>所属部署</th>
            <th>役職</th>
            <th>名前</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>携帯番号</th>
        </tr>
        @foreach ($businessCards as $card)
            <tr>
                <td><a href="{{ route('business-card.show', ['businessCard' => $businessCard]) }}">{{ $card->id }}</a>
                </td>
                <td>{{ $card->corp->corp_name }}</td>
                <td>{{ $card->division }}</td>
                <td style="text-align: center;">{{ !empty($card->title) ? $card->title : 'ー' }}</td>
                <td>{{ $card->employee_name }}</td>
                <td>{{ $card->corp->address }}</td>
                <td>{{ $card->corp->tel }}</td>
                <td>{{ $card->mobile_phone }}</td>
            </tr>
        @endforeach
    </table>
    <p class="no-data-message">※名刺データはありません。</p>
    <br>
    <br>
    <br>
    <br>

    <script src="{{ asset('js/corp.js') }}"></script>
