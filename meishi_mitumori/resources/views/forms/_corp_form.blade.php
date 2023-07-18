<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<form class="h-adr" action="{{ $action }}" method="POST" onsubmit="return checkMessage()">
    <table cellpadding="1">
        @csrf
        <tr>
            <th>会社名</th>
            <td><input type="text" id='corp_name' name="corp_name"
                    value="{{ $action === 'add' ? old('corp_name') : $corp->corp_name }}"></td>
        </tr>
        <tr>
            <th>郵便番号</th>
            <td>
                <span class="p-country-name" style="display:none;">Japan</span>
                〒<input type="text" style="width: 150px" id="postal_code" class="p-postal-code" size="7"
                    maxlength="7" name="postal_code"
                    value="{{ $action === 'add' ? old('postal_code') : $corp->postal_code }}">
                <br>
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                <input type="text" id="address" class="p-region p-locality p-street-address p-extended-address"
                    name="address" value="{{ $action === 'add' ? old('address') : $corp->address }}">
            </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><input type="text" id="tel" name="tel"
                    value="{{ $action === 'add' ? old('tel') : $corp->tel }}"></td>
        </tr>
    </table>
    <br>
    <br>
    <div class="button">
        <button type="button" onclick="location.href='{{ $backUrl }}'">所属部署一覧へ戻る</button>
        <input type="submit" value="{{ $submitButtonLabel }}">
    </div>
</form>
