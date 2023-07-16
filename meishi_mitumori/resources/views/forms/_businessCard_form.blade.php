<div class="error-messages">
    @if ($errors->any());
    <ul>
        @foreach ($errors as $error)
            <li class="post-error-list">{{ $error }}</li>
        @endforeach
    </ul>
</div>
<table cellpadding="1">
    @csrf
    <tr>
        <th></th>
    </tr>
</table>
