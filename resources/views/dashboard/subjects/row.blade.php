<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->user->username }} </td>
<td> {{ $row->subject }} </td>
<td> {{ $row->row->name }} </td>
<td> {!! $row->semester() !!} </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
