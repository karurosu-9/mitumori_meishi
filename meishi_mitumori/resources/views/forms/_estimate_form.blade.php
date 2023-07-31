<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">※{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

<input type="hidden" name="corp_id" value="{{ old($corp->id, $corp->id) }}">
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
                    value="{{ Route::currentRouteName() === 'estimate.add' ? old('tekiyo' . $i) : $tekiyo[$i] }}"></td>
            <td><input type="text" name="unit_price{{ $i }}" id="unit-price-{{ $i }}"
                    onChange="subTotal()" value="{{ Route::currentRouteName() === 'estimate.add' ? old('unit_price' . $i) : $unitPrice[$i] }}" style="width: 100px"></td>
            <td><input type="text" name="quantity{{ $i }}" id="quantity-{{ $i }}"
                    onChange="subTotal()" value="{{ Route::currentRouteName() === 'estimate.add' ? old('quantity' . $i) : $quantity[$i] }}" style="width: 80px">
            </td>
            <td><input type="text" name="amount{{ $i }}" id="amount-{{ $i }}"
                    value="{{ Route::currentRouteName() === 'estimate.add' ? old('amount' . $i) : $amount[$i] }}" style="width: auto" readonly>
            </td>
            <td><input type="text" name="note{{ $i }}" value="{{ Route::currentRouteName() === 'estimate.add' ? old('note' . $i) : $note[$i] }}"
                    style="width: 400px">
            </td>
        </tr>
    @endfor
    <tr>
        <td colspan="1" class="total_price">合計</td>
        <td class="none">――</td>
        <td class="none">――</td>
        <td><input type="text" name="total_price" id="total-price" value="{{ Route::currentRouteName() === 'estimate.add' ? old('total_price') : $totalPrice }}" readonly></td>
        <td class="none"></td>
    </tr>
</table>

<div>補足</div>
@for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++)
    <div><input type="text" name="hosoku{{ $i }}" value="{{ Route::currentRouteName() === 'estimate.add' ? old('hosoku' . $i) : $hosoku[$i] }}"
            style="width: 1134px">
    </div>
@endfor
<br>
<br>
<div class="button">
    <button type="button" onclick="location.href='{{ $backUrl }}'">{{ $buttonLabelValue }}</button>
    <input type="submit" value="確認">
</div>
