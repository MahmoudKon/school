{{-- <div style="width: 600px; padding: 2rem 2rem 0 2rem;"> --}}
<div class="px-2">
    {{-- Role Name Input --}}
    <div class="form-group">
        <label> @lang('roles.name') :</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-tag"></i> </span>
            </div>
            <input type="text" name="name" class="form-control" value="{{ $row->name ?? '' }}" placeholder="@lang('roles.name') | ex: admin">
        </div>
        <span id="name_error" class="red error"></span>
    </div>

    {{-- Role Display Name Input --}}
    <div class="form-group">
        <label> @lang('roles.display_name') :</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-eye"></i> </span>
            </div>
            <input type="text" name="display_name" class="form-control"
                placeholder="@lang('roles.display_name') | ex: Admin" value="{{ $row->display_name ?? '' }}">
        </div>
        <span id="display_name_error" class="red error"></span>
    </div>

    {{-- Role Description Input --}}
    <div class="form-group">
        <label> @lang('roles.description') :</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-quote-right"></i> </span>
            </div>
            <input type="text" name="description" class="form-control" placeholder="@lang('roles.description')"
                value="{{ $row->description ?? '' }}" placeholder="@lang('roles.description')">
        </div>
        <span id="description_error" class="red error"></span>
    </div>

    {{-- Checkbox To Permissions --}}
    <div class="card">
        <div class="card-header bg-info">
            <h3 class="card-title white"> <i class="fa fa-hashtag"></i> @lang('general.permissions') </h3>
        </div>

        <div class="card-content">
            <div class="card-body p-0">
                {{-- Tabs Links [ Models ] --}}
                <ul class="nav nav-tabs nav-top-border no-hover-bg">
                    @foreach (getPermissions() as $key => $val)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="base-{{ $key }}"
                            data-toggle="tab" aria-controls="{{ $key }}" href="#{{ $key }}"
                            aria-expanded="true">@lang('general.' . $key)</a>
                    </li>
                    @endforeach
                </ul>

                {{-- Tabs Content [ Checkbox ] --}}
                <div class="tab-content px-1 pt-1">
                    @foreach (getPermissions() as $key => $permissions)
                    <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{ $key }}"
                        aria-labelledby="base-{{ $key }}">
                        @foreach ($permissions as $permission)
                        <label class="btn btn-sm btn-outline-success btn-glow">
                            <input type="checkbox" name="permissions[name][]"
                                {{ isset($row) ? ($row->hasPermission($permission) ? 'checked' : '') : '' }}
                                value="{{ $permission }}">
                            @lang('general.' . explode('_', $permission)[0])
                        </label>
                        @endforeach
                    </div>
                    @endforeach
                    <span id="permissions_error" class="red error"></span>
                </div>
            </div>
        </div>
    </div>
</div>
