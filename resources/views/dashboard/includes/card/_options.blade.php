<span class="dropdown">
    <button id="btnSearchDrop2" data-toggle="dropdown"
        class="btn btn-round btn-info dropdown-toggle">
        <i class="ft-settings"></i> @lang('general.settings')
    </button>

    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu" x-placement="top-end"
        style="position: relative; transform: translate3d(-30px, 45px, 10px); top: 3px; right: -30px; left: -30px; padding:13px; will-change: transform;">

        @if (!in_array('reset', $options))
            <a href="javascript:void(0)" class="btn btn-outline-warning btn-glow btn-sm mb-1 " id="reset-btn"
                data-toggle="tooltip" data-original-title="@lang('general.reset')">
                <b class="fa fa-undo"></b>
            </a>
        @endif

        @if (!in_array('create', $options))
            <a href="{{ route('dashboard.' . getModel() . '.create') }}"
                class="btn btn-outline-primary btn-glow btn-sm mb-1 load-form" data-toggle="tooltip"
                data-original-title="@lang('general.create_new')">
                <b class="fa fa-plus"></b>
            </a>
        @endif

        @if (!in_array('import', $options))
            <a href="{{ route('dashboard.' . getModel() . '.import') }}"
                class="btn btn-outline-blue btn-glow btn-sm mb-1 load-form" data-toggle="tooltip"
                data-original-title="@lang('general.import_excel')">
                <b class="fa fa-file-import"></b>
            </a>
        @endif

        @if (!in_array('export', $options))
            <a href="{{ route('dashboard.' . getModel() . '.export', 'excel') }}"
                class="btn btn-outline-purple btn-glow btn-sm mb-1" data-toggle="tooltip"
                data-original-title="@lang('general.excel')">
                <b class="fa fa-file-excel"></b>
            </a>
        @endif

        @if (!in_array('destroy', $options))
            <a href="javascript:void(0)" class="btn btn-outline-danger btn-glow btn-sm mb-1 btn_action" data-action="destroy"
                data-toggle="tooltip" data-original-title="@lang('general.destroy')">
                <b class="fa fa-trash"></b>
            </a>
        @endif

        @if (!in_array('print', $options))
            <a href="table" class="btn btn-outline-primary btn-glow btn-sm mb-1 print" data-toggle="tooltip"
                data-original-title="@lang('general.print')">
                <b class="fa fa-print"></b>
            </a>
        @endif
    </span>
</span>
