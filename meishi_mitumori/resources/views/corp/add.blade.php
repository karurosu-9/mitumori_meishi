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
    <form action="{{ route('corp.add') }}" class="h-adr" name="form" method="POST" onsubmit="return addCheckMessage()">
        <table cellpadding="1">
            @csrf
            <tr>
                <th>会社名</th>
                <td><input type="text" id='corp_name' name="corp_name" value="{{ old('corp_name') }}"></td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td>
                    <span class="p-country-name" style="display:none;">Japan</span>
                    〒<input type="text" id="postal_code" class="p-postal-code" size="7" maxlength="7"
                        name="postal_code" value="{{ old('postal_code') }}">
                    <br>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" id="address" class="p-region p-locality p-street-address p-extended-address"
                        name="address" value="{{ old('address') }}">
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><input type="text" id="tel" name="tel" value="{{ old('tel') }}"></td>
            </tr>
        </table>
        <br>
        <br>
        <div class="button">
            <button onclick="location.href='{{ route('corp.list') }}'">戻る</button>
            <input type="submit" value="登録">
        </div>
    </form>
    <br>
    <br>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script>
        function addCheckMessage() {
            let emptyFields = []
            let corpNameElement = document.getElementById('corp_name');
            let corpName = corpNameElement.value ? corpNameElement.value : '';
            console.log(corpName);

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

            if (emptyFields.length > 0) {
                let emptyFieldsString = emptyFields.join(',')
                alert('未記入の欄があります。:' + emptyFieldsString)
                return false;
            }

            let msg = confirm('この内容で登録してもよろしいですか？');
            return msg;
        }
    </script>

@endsection
