<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->name }} </td>
<td> {{ $row->description }} </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
