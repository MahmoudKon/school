{{-- <div style="width: 600px; padding: 2rem 2rem 0 2rem;"> --}}
<div class="px-2">
    {{-- Input To Display Teacher Name --}}
    <div class="form-group">
        <label> @lang('subjects.teacher') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div>
            <select class="custom-select" {{ isset($row) ? 'disabled' : '' }} name="user_id">
                @if ($teachers->count() == 0)
                    <option disabled> No Teachers</option>
                @endif

                @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ isset($row) ? ($row->user_id == $teacher->id ? 'selected' : '') : '' }}>
                    {{ $teacher->username }}
                </option>
                @endforeach
            </select>
        </div>
        <span id="user_id_error" class="red error"></span>
    </div>

    {{-- Subject Name Input --}}
    <div class="form-group">
        <label> @lang('subjects.subject') :</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-book"></i> </span>
            </div>
            <input type="text" name="subject" class="form-control" value="{{ $row->subject ?? '' }}" placeholder="@lang('subjects.subject')">
        </div>
        <span id="subject_error" class="red error"></span>
    </div>

    {{-- Input To Display Rows --}}
    <div class="form-group">
        <label> @lang('subjects.classroom') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-school"></i> </span> </div>
            <select class="custom-select" {{ isset($row) ? 'disabled' : '' }} name="row_id">
                @foreach ($classes as $class)
                <option value="{{ $class->id }}"
                    {{ isset($row) ? ($row->row_id == $class->id ? 'selected' : '') : '' }}>
                    {{ $class->name }}
                </option>
                @endforeach
            </select>
        </div>
        <span id="row_id_error" class="red error"></span>
    </div>

    {{-- Input To Display Semester --}}
    <div class="form-group">
        <label> @lang('subjects.semester') </label>
        <div class="skin skin-square">
            <label class="px-2">
                <input type="radio" name="semester" checked value=0 {{ isset($row) ? $row->semester == 0 ? 'checked' : '' : '' }}>
                @lang('subjects.first')
            </label>

            <label class="px-2">
                <input type="radio" name="semester" value=1 {{ isset($row) ? $row->semester == 1 ? 'checked' : '' : '' }}>
                @lang('subjects.second')
            </label>
        </div>
        <span id="semester_error" class="red error"></span>
    </div>
</div>
