<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

<table cellpadding="1">
    <tr>
        <th>摘要</th>
        <th>単価</th>
        <th>数量</th>
        <th>金額</th>
        <th>備考</th>
    </tr>
    @for ($i = 1; $i <= FormCountConsts::FORM_NOT_HOSOKU; $i++) {
        <tr>
            <td><input type="text" style="width: 200px;" name="tekiyo{{ $i }}" value="{{ old('tekiyo' . $i) }}"></td>
            <td><input type="text" name="unit_price{{ $i }}" value="{{ old('unit_price' . $i) }}"></td>
            <td><input type="text" name="quantity{{ $i }}" value="{{ old('quantity' . $i) }}"></td>
            <td><input type="text" name="amount{{ $i }}" value="{{ old('amount' . $i) }}">/td>
            <td><input type="text" name="note{{ $i }}" value="{{ old('note' . $i) }}"></td>
        </tr>
    }
    <tr>
        <th>合計金額</th>
        <td></td>
    </tr>
</table>
<br>
<br>
<div class="button">
    <button type="button" onclick="location.href='{{ $backUrl }}'">{{ $buttonLabelValue }}</button>
    <input type="submit" value="登録">
</div>
