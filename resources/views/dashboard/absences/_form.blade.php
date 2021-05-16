<div class="px-2">
    <div class="row">
        <div class="col-md-12">
            {{-- Input To Display User Name --}}
            <div class="form-group">
                <label> @lang('users.username') </label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div>
                    <select class="custom-select" {{ isset($row) ? 'disabled' : '' }} name="user_id">
                        <option>@lang('users.username')</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-code="{{ $user->code }}" {{ isset($row) ? ($row->user_id == $user->id ? 'selected' : '') : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <span id="user_id_error" class="red error"></span>
            </div>
        </div>

        <div class="col-md-12">
            {{-- Input To Display User Code --}}
            <div class="form-group">
                <label> @lang('users.code') </label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-id-card"></i> </span> </div>
                    <input type="text" class="form-control" name='code_id' readonly placeholder=@lang('users.code')
                        value="{{ $row->code_id ?? '' }}">
                </div>
                <span id="code_id_error" class="red error"></span>
            </div>
        </div>

        <div class="col-md-12">
            {{-- Input To Display Note --}}
            <div class="form-group">
                <label> @lang('absences.note') </label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-quote-right"></i> </span>
                    </div>
                    <input type="text" name="note" class="form-control" placeholder=@lang('absences.note')
                        value="{{ $row->note ?? '' }}">
                </div>
                <span id="note_error" class="red error"></span>
            </div>
        </div>

        <div class="col-md-12">
            {{-- Checkbox --}}
            <div class="form-group">
                <div class="skin skin-square">
                    <label class="px-2">
                        <input type="radio" name="status" value=0 checked>
                        @lang('absences.existing')
                    </label>

                    <label class="px-3">
                        <input type="radio" name="status" value=1>
                        @lang('absences.absent')
                    </label>
                </div>
                <span id="status_error" class="red error"></span>
            </div>
        </div>
    </div>
</div>
