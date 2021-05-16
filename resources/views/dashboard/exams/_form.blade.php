{{-- <div style="width: 600px; padding: 2rem 2rem 0 2rem;"> --}}
<div class="px-2">
    {{-- Input To Display Teacher Name --}}
    <div class="form-group">
        <label> @lang('exams.teacher') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div>
            <select class="custom-select" {{ isset($row) ? 'disabled' : '' }} name="user_id">
                @if(auth()->user()->hasRole('teacher'))
                    <option value="{{ auth()->user()->id }}"> {{ auth()->user()->username }} </option>
                @else
                    @if ($teachers->count() == 0)
                        <option> No Subjects</option>
                    @endif
                    @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}"
                        {{ isset($row) ? ($row->user_id == $teacher->id ? 'selected' : '') : '' }}>
                        {{ $teacher->username }}
                    </option>
                    @endforeach
                @endif
            </select>
        </div>
        <span id="user_id_error" class="red error"></span>
    </div>

    {{-- Input To Display Exam Name --}}
    <div class="form-group">
        <label> @lang('exams.name') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-book"></i> </span> </div>
            <input type="text" class="form-control" name='name' placeholder="@lang('exams.name')"
                value="{{ $row->name ?? '' }}">
        </div>
        <span id="name_error" class="red error"></span>
    </div>

    {{-- Input To Display Subjects Name --}}
    <div class="form-group">
        <label> @lang('subjects.subject') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-book"></i> </span> </div>
            <select class="custom-select" {{ isset($row) ? 'disabled' : '' }} name="subject_id">
                @if ($subjects->count() == 0)
                    @if (isset($row))
                        <option value="{{ $row->subject_id ?? '' }}"> {{ $row->subject->subject ?? '' }} </option>
                    @else
                        <option> No Subjects</option>
                    @endif
                @endif

                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        {{ isset($row) ? ($row->subject_id == $subject->id ? 'selected' : '') : '' }}>
                        {{ $subject->subject }}
                    </option>
                @endforeach
            </select>
        </div>
        <span id="subject_id_error" class="red error"></span>
    </div>

    {{-- Input To Display Time --}}
    <div class="form-group">
        <label> @lang('exams.time') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-clock"></i> </span> </div>
            <input type="number" class="form-control" name='time' placeholder="@lang('exams.time') | @lang('exams.by_minutes')"
                value="{{ $row->time ?? '60' }}">
        </div>
        <span id="time_error" class="red error"></span>
    </div>

    {{-- Input To Display Degree --}}
    <div class="form-group">
        <label> @lang('exams.degree') </label>
        <div class="input-group">
            <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-clock"></i> </span> </div>
            <input type="number" class="form-control" name='degree'
                placeholder="@lang('exams.degree')" value="{{ $row->degree ?? '60' }}">
        </div>
        <span id="degree_error" class="red error"></span>
    </div>
</div>
