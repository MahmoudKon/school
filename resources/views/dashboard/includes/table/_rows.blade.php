@if ($rows->count() > 0)
    @foreach ($rows as $index => $row)
        <tr data-id={{ $row->id }}>
            @include('dashboard.' . getModel() . '.row')
        </tr>
    @endforeach
    <tr class="remove-when-print" id="paginate-links">
        <td colspan="10" class="p-0">
            {!! $rows->links() !!}
        </td>
    </tr>
@else
    <tr>
        <td colspan="10">
            <div class="alert alert-icon-right alert-arrow-right alert-warning alert-dismissible text-center"
                role="alert">
                <span class="alert-icon"><i class="la la-warning"></i></span>
                <strong>@lang('alerts.warning') </strong> @lang('alerts.no_records')
            </div>
        </td>
    </tr>
@endif
