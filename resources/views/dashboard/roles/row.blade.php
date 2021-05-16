<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->display_name }} </td>
<td> {{ $row->description }} </td>
{{-- <td> {{ $row->users->count() }} </td>
<td> {{ $row->permissions->count() }} </td> --}}
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
