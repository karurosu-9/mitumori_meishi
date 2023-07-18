<form action="{{ $action }}" method="POST" onsubmit="checkMessage()">
    <select id="select-corp-list">
        @foreach ($corps as $corp)
            <option value="{{ $corp->id }}">{{ $corp->corp_name }}</option>
        @endforeach
    </select>
    <table>
        <tr>
            <th>部署名</th>
            <td><input id="division-name" type="text" name="divisionName" value="{{ old('divisionName') }}"></td>
        </tr>
    </table>
    <div class="button">
        <button type="button" onclick="location.href='{{ $backUrl }}'"></button>
        <input type="submit" value="{{ $submitButtonLabel }}">
    </div>
</form>
