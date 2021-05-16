<span class="dropdown">
    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="btn btn-info btn-sm dropdown-menu-right">
        <i class="ft-settings m-0"></i>
    </button>
    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="top-end"
        style="position: absolute; transform: translate3d(0px, 23px, 10px); top: 0px; right: -85px; will-change: transform;">
        <a href="{{ route('dashboard.' . getModel() . '.edit', $row->id) }}" class="dropdown-item primary load-form">
            <i class="ft-edit"></i> @lang('general.edit')
        </a>

        <a href="{{ route('dashboard.' . getModel() . '.show', $row->id) }}" class="dropdown-item info">
            <i class="ft-eye "></i> @lang('general.show')
        </a>

        @if (getModel() == 'users')
            <a href="{{ route('dashboard.' . getModel() . '.card', $row->id) }}"
                class="dropdown-item purple load-form">
                <i class="fa fa-id-card"></i> @lang('users.card')
            </a>
        @endif

        <a href="javascript:void(0)" class="dropdown-item btn bg-transparent danger btn_action"
            data-id={{ $row->id }} data-action="destroy">
            <i class="ft-trash"></i> @lang('general.destroy')
        </a>
    </span>
</span>
