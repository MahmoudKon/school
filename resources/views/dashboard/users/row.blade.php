<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> <img src="{{ $row->image_path }}" class="img-border img-thumbnail" max-width="100px"> </td>
<td> {{ $row->username }} </td>
<td> {{ $row->full_name }} </td>
<td> {{ $row->email }} </td>
<td> {{ $row->phone }} </td>
<td> {{ $row->code }} </td>
<td> {{ $row->created_at }} </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
