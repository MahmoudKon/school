<div class="px-2">
    <div class="row">
        <div class="col-md-12">
            {{-- Input To Display ROW Name --}}
            <div class="form-group">
                <label> @lang('rows.name') </label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-school"></i> </span> </div>
                    <input type="text" class="form-control" name='name' placeholder="@lang('rows.name')" value="{{ $row->name ?? '' }}">
                </div>
                <span id="name_error" class="red error"></span>
            </div>
        </div>
    </div>
</div>


{{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <div class="col-md-12">
        <div class="form-group">
            <label> @lang('rows.name') <span class="badge badge-primary"> {{ $properties['native'] }} </span> </label>
            <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-school"></i> </span> </div>
                <input type="text" class="form-control" name='name[{{ $localeCode }}]' placeholder="@lang('rows.name')" value="{{ $row->name ?? '' }}">
            </div>
            <span id="name_{{ $localeCode }}_error" class="red error"></span>
        </div>
    </div>
@endforeach --}}
