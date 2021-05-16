{{-- <div style="width: 600px; padding: 2rem 2rem 0 2rem;"> --}}
<div class="px-2">
    <div class="row">
        {{-- Permission Name Input [ col-6 ] --}}
        <div class="col-md-12">
            {{-- Permission Name Input --}}
            <div class="form-group">
                <label> @lang('permissions.name') :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="@lang('permissions.name')"
                        value="{{ isset($row->name) ? explode('_', $row->name)[1] : '' }}"
                        placeholder="@lang('permissions.name') | ex: users">
                </div>
                <span id="name_error" class="red error"></span>
            </div>
        </div>

        {{-- Action Name select [ C, R, U, D ] [ col-6 ] --}}
        <div class="col-md-12">
            {{-- Action Name Select --}}
            <div class="form-group">
                <label> @lang('permissions.action') :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-tag"></i> </span>
                    </div>
                    <select name='action' class="custom-select" id="customSelect">
                        @foreach (['create', 'read', 'update', 'delete'] as $action)
                            <option value="{{ $action }}"
                                {{ isset($row) ? (explode('_', $row->name)[0] == $action ? 'selected' : '') : '' }}>
                                @lang('general.' . $action)
                            </option>
                        @endforeach
                    </select>
                    <span id="action_error" class="red error"></span>
                </div>
            </div>
        </div>

        <span id="permission_error" class="red error"></span>

        {{-- Role Description Input [ col-12 ] --}}
        <div class="col-md-12">
            {{-- Role Description Input --}}
            <div class="form-group">
                <label> @lang('permissions.description') :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-quote-right"></i> </span>
                    </div>
                    <input type="text" name="description" class="form-control" value="{{ $row->description ?? '' }}"
                        placeholder="@lang('permissions.description') | ex: users">
                </div>
                <span id="description_error" class="red error"></span>
            </div>
        </div>
    </div>
</div>
