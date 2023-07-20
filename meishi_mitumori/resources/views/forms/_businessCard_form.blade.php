<div class="error-messages">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="post-error-list">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<form action="{{ $action }}" method="POST" onsubmit='return formCheckMessage()'>
    <table cellpadding="1">
        @csrf
        <tr>
            <th>所属部署</th>
            <td>
                <!-- corp_idは入力しなくても挿入される仕様 -->
                <input type="hidden" name="corp_id" value="{{ $corp->id }}">
                <select id="division" name="division" onchange="disableTextInput(this)">
                    <option value="">-- 部署を選択してください。--</option>
                    <option value="">-- 部署を入力する --</option>
                    @foreach ($distinctDivisionNames as $divisionName)
                        <option value="{{ $divisionName }}"
                            {{ $businessCard && $action === route('business-card.edit', ['corp' => $corp]) && $divisionName === old('division') ? 'selected' : old('division') }}>
                            {{ $divisionName }}</option>
                    @endforeach
                </select>
                <br>
                <span id="divisionMessage"
                    style="color: red; font-weight: bold; font-size: 10px;">※リストに部署がなければ、入力してください。</span>
                <br>
                <input type="text" name="division" id="divisionTextInput"
                    value="{{ $action === route('business-card.edit', ['corp' => $corp]) ? $businessCard->division : old('division') }}">
            </td>
        </tr>
        <tr>
            <th>役職</th>
            <td><input type="text" id="title" name="title"
                    value="
                    {{ isset($businessCard) && $action === route('business-card.edit', ['corp' => $corp]) ? $businessCard->title : old('title') }}">
            </td>
        </tr>
        <tr>
            <th>名前</th>
            <td><input type="text" id="employee-name" name="employee_name"
                    value="{{ $action === route('business-card.edit', ['corp' => $corp]) && $businessCard ? $businessCard->employee_name : old('employee_name') }}">
            </td>
        </tr>
        <tr>
            <th>携帯番号</th>
            <td><input type="text" id="mobile-phone" name="mobile_phone"
                    value="{{ $action === route('business-card.edit', ['corp' => $corp]) && $businessCard ? $businessCard->mobile_phone : old('mobile_phone') }}">
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div class="button">
        <button type="button" onclick="location.href='{{ $backUrl }}'">名刺一覧へ戻る</button>
        <input type="submit" value="登録">
    </div>
</form>
