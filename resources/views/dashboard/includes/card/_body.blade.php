<div class="d-flex justify-content-around ">
    <div>
        <div class="form-group mb-0">
            <select class="custom-select" id="record-number">
                <option value=10>10 @lang('general.records')</option>
                <option value=25>25 @lang('general.records')</option>
                <option value=50>50 @lang('general.records')</option>
                <option value='-1'>@lang('general.all_records')</option>
            </select>
        </div>
    </div>
    <div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary border-primary white" id="basic-addon7"><i
                        class="la la-search"></i></span>
            </div>
            <input type="text" name="search" id="search-text" class="form-control"
                placeholder="@lang('general.search')">
        </div>
    </div>
    <div>
        <div class="form-group mb-0">
            <select class="custom-select" id="column-name">
                @foreach ($columns as $column)
                    <option value="{{ $column }}">@lang(getModel() . '.' . $column)</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
