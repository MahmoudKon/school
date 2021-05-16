<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->name }} </td>
<td> {{ $row->subject->subject }} </td>
<td> {{ $row->time }}  @lang('exams.minutes') </td>
<td> <div class="badge badge-glow badge-pill badge-success"> {{ $row->questions->count() }} </div> </td>
<td> <div class="badge badge-glow badge-pill badge-primary"> {{ $row->degree }} </div> </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
