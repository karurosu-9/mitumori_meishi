<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<!-- formの内容 -->
<table cellpadding="1">
    <tr>
        <th>会社名</th>
        <td><input type="text" id="corp-name" name="corp_name"
                value="{{ old('corp_name') ?? (Route::currentRouteName() === 'corp.edit' ? $corp->corp_name : '') }}">
        </td>
    </tr>
    <tr>
        <th>郵便番号</th>
        <td>
            <span class="p-country-name" style="display:none;">Japan</span>
            〒<input type="text" style="width: 150px" id="postal-code" class="p-postal-code" size="7"
                maxlength="7" name="postal_code"
                value="{{ old('postal_code') ?? (Route::currentRouteName() === 'corp.edit' ? $corp->postal_code : '') }}">
            <br>
        </td>
    </tr>
    <tr>
        <th>住所</th>
        <td>
            <input type="text" id="address" class="p-region p-locality p-street-address p-extended-address"
                name="address"
                value="{{ old('address') ?? (Route::currentRouteName() === 'corp.edit' ? $corp->address : '') }}">
        </td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td><input type="text" id="tel" name="tel"
                value="{{ old('tel') ?? (Route::currentRouteName() === 'corp.edit' ? $corp->tel : '') }}"></td>
    </tr>
</table>
<br>
<br>
<div class="button">
    <button type="button" onclick="location.href='{{ $backUrl }}'">{{ $buttonLabelValue }}</button>
    <input type="submit" value="登録">
</div>
