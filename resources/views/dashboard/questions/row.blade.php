<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->exam->subject->subject }} </td>
<td> {{ $row->question }} </td>
<td>
    @foreach (unserialize($row->answers) as $answer)
        <div class="badge badge-glow badge-pill badge-info"> {{ $answer }} </div>
    @endforeach
</td>
<td> <div class="badge badge-glow badge-pill badge-primary"> {{ $row->correct }} </div> </td>
<td> <div class="badge badge-glow badge-pill badge-primary"> {{ $row->degree }} </div> </td>
<td> <img src="{{ $row->Attach_path }}" alt="{{ $row->exam->subject->name }}"> </td>
<td class="remove-when-print"> @include('dashboard.includes.table._btn') </td>
