<div class="error-messages">
    @if ($errors->any());
    <ul>
        @foreach ($errors as $error)
            <li class="post-error-list">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>
<table cellpadding="1">
    @csrf
    <tr>
        <th>所属部署</th>
        <td><input type="text" name="division" value="{{ $action === 'add' ? old('division') : $corp->division }}"></td>
    </tr>
    <tr>
        <th>役職</th>
        <td><input type="text" name="title" value="{{ $action === 'add' ? old('title') : $corp->title }}"></td>
    </tr>
    <tr>
        <th>名前</th>
        <td><input type="text" name="employee_name" value="{{ $action === 'add' ? old('employee_name') : $corp->employee_name}}"></td>
    </tr>
    <tr>
        <th>携帯番号</th>
        <td><input type="text" name="mobile_phone" value="{{ $action === 'add' ? old('mobile_phone') : $corp->mobile_phone}}"></td>
    </tr>
</table>
