<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">※{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

<div style="font-size: 18px;">
    <label for="date" style="font-weight: bold;">日付を選択</label>
    <br>
    <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}">
</div>
<br>
<br>
<table cellpadding="1">
    <tr>
        <th>摘要</th>
        <th>単価</th>
        <th>数量</th>
        <th>金額</th>
        <th>備考</th>
    </tr>
    @for ($i = 1; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++)
        <tr>
            <td><input type="text" style="width: 400px;" name="tekiyo{{ $i }}"
                    value="{{ old('tekiyo' . $i) }}"></td>
            <td><input type="text" name="unit_price{{ $i }}" id="unit_price_{{ $i }}"
                    onChange="subTotal()" value="{{ old('unit_price' . $i) }}" style="width: 100px"></td>
            <td><input type="text" name="quantity{{ $i }}" id="quantity_{{ $i }}"
                    onChange="subTotal()" value="{{ old('quantity' . $i) }}" style="width: 80px">
            </td>
            <td><input type="text" name="amount{{ $i }}" id="amount_{{ $i }}"
                    value="{{ old('amount' . $i) }}" style="width: 100px" readonly>
            </td>
            <td><input type="text" name="note{{ $i }}" value="{{ old('note' . $i) }}"
                    style="width: 400px">
            </td>
        </tr>
    @endfor
</table>
<div>補足</div>
@for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++)
    <div><input type="text" name="hosoku{{ $i }}" value="{{ old('hosoku' . $i) }}"
            style="width: 1134px">
    </div>
@endfor
<br>
<br>
<div class="button">
    <button type="button" onclick="location.href='{{ $backUrl }}'">{{ $buttonLabelValue }}</button>
    <input type="submit" value="確認">
</div>
