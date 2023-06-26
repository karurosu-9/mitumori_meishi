@extends('layouts.layout')

@section('title', '会社一覧')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 名詞一覧 】</h1>
    <br>
    <br>
    <select id="select-division" class="select-box">
        <option value="" selected>-- 部署の絞り込み --</option>
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
                <td><a href="{{ route('corp.show', ['corp' => $corp]) }}">{{ $card->id }}</a></td>
                <td>{{ $card->corp->corp_name }}</td>
                <td>{{ $card->division }}</td>
                <td style="text-align: center;">{{ !empty($card->title) ? $card->title : "ー" }}</td>
                <td>{{ $card->employee_name }}</td>
                <td>{{ $card->corp->address }}</td>
                <td>{{ $card->corp->tel }}</td>
                <td>{{ $card->mobile_phone }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <button onclick="history.back()">戻る</button>

    <script>
        let selectElement = document.getElementById('select-division');

        //セレクトボックスの値が変更された時に呼び出される関数
        selectElement.addEventListener('change', function() {
            let selectedDivision = this.value;

            //部署ごとに表示する名刺データの処理をする関数
            displayBusinessCards(selectedDivision);
        })

        function displayBusinessCards(selectedDivision) {
            //全ての<tr>の要素を取得
            let tableRows = document.querySelectorAll('#business-cards-table tr');

            //最初の<tr>行は<th>の値になるだけなので、取得しない。それ以降の<tr>行をデータがあるだけ取得
            for (let i = 1; i < tableRows.length; i++) {
                /*変数rowには
                    <tr>
                        <td>～</td>から
                        <td>～</td>までを1行とする値を行ごとにrowに格納
                    </tr>
                */
                let row = tableRows[i];
                //1行の3番目の<td>の値({{ $card->division }})を取得
                let division = row.cells[2].textContent;

                if (division === selectedDivision) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
