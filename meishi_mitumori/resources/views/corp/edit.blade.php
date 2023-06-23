@extends('layouts.layout')

@section('title', '会社-詳細')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1>【 会社-登録 】</h1>
    <br>
    <br>
    <form action="{{ route('corp.edit', $corp->id) }}" class="h-adr" method="POST" onsubmit="return addCheckMessage()">
    @include('forms._corp_form', ['action' => 'edit'])
    <br>
    <br>
    <div class="button">
        <button onclick="location.href='{{ route('corp.list') }}'">戻る</button>
        <input type="submit" value="編集">
    </div>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script>
        function addCheckMessage() {
            //未記入の項目名を入れる変数
            let emptyFields = []

            let corpNameElement = document.getElementById('corp_name');
            let corpName = corpNameElement.value ? corpNameElement.value : '';
            if (corpName === '') {
                emptyFields.push('会社名');
            }

            let postalCodeElement = document.getElementById('postal_code');
            let postalCode = postalCodeElement.value ? postalCodeElement.value : '';
            if (postalCode === '') {
                emptyFields.push('郵便番号');
            }

            let addressElement = document.getElementById('address');
            let address = addressElement.value ? addressElement.value : '';
            if (address === '') {
                emptyFields.push('住所');
            }

            let telElement = document.getElementById('tel');
            let tel = telElement.value ? telElement.value : '';
            if (tel === '') {
                emptyFields.push('電話番号');
            }

            //未記入の項目があった時の処理
            if (emptyFields.length > 0) {
                let emptyFieldsString = emptyFields.join(',')
                alert('未記入の項目があります。:' + emptyFieldsString)
                return false;
            }

            let msg = confirm('この内容で登録してもよろしいですか？');
            return msg;
        }
    </script>

@endsection
