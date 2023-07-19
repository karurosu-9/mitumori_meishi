@extends('layouts.layout')

@section('title', '会社一覧')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 会社一覧 】</h1>
    <br>
    <br>
    <table cellpadding="1">
        <tr>
            <th>会社名</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>操作</th>
        </tr>
        <tr>
            @foreach ($corps as $corp)
        <tr>
            <td><a href="{{ route('corp.show', ['corp' => $corp]) }}">{{ $corp->corp_name }}</a></td>
            <td>{{ $corp->address }}</td>
            <td>{{ $corp->tel }}</td>
            <td>
                <div class="button">
                    <button onclick="editCorp('{{ route('corp.edit', ['corp' => $corp]) }}')">編集</button>
                    <button onclick="deleteCorp(event, '{{ route('corp.delete', ['corp' => $corp]) }}')"
                        data-corp-name="{{ $corp->corp_name }}">削除</button>
                </div>
            </td>
        </tr>
        @endforeach
        </tr>
    </table>
    <br>
    <br>

    <script src="{{ asset('js/corp.js') }}"></script>
