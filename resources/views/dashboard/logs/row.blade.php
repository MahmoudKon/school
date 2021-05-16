<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->users->username }} </td>
<td>
    <textarea class="form-control" disabled
        style="min-width:250px;border:none;overflow:hidden;">{{ $row->message }}</textarea>
</td>
<td> {{ $row->url }} </td>
<td> {!! $row->page !!} </td>
<td> {{ $row->method }} </td>
<td> {{ $row->controller }} </td>
<td> {{ $row->model }} </td>
<td> {{ $row->created_at }} </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
