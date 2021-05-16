<td class="check-item remove-when-print"> <input type="checkbox" class="check-box-id" name="id[]" value="{{ $row->id }}"></td>
<td> {{ $row->user->username }} </td>
<td> {{ $row->day }} </td>
<td> {{ $row->month }} </td>
<td> {{ $row->created_at }} </td>
<td>{{ $row->Tpresence }} </td>
<td>{{ $row->Tback }} </td>
<td>{!! $row->status() !!} </td>
<td> {{ $row->note }} </td>
<td class="remove-when-print">
    <a href="javascript:void(0)" class="btn btn-outline-danger btn-glow btn-sm btn_action" data-id={{ $row->id }} data-action="destroy"
        data-toggle="tooltip" data-original-title="@lang('general.destroy')">
        <b class="fa fa-trash"></b>
    </a>
</td>
