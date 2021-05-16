<div style="width: 700px; padding: 2rem 2rem 0 2rem;">
    <div class="row">
        <div class="col-md-6">
            {{-- User Name Input --}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div>
                    <select class="form-control " name="user_id"
                        data-url={{ route('dashboard.' . getModel() . '.getabsence') }}>
                        <option>@lang('users.username')</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" class="user_id">{{ $user->username }} </option>
                        @endforeach
                    </select>
                </div>
                <span id="user_id_error" class="red error"></span>
            </div>

            {{-- Full Name Input --}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-ruble-sign"></i> </span> </div>
                    <input type="number" name="salary" class="form-control" placeholder="@lang('salaries.salary')"
                        value="{{ $row->salary ?? '' }}">
                </div>
                <span id="salary_error" class="red error"></span>
            </div>

            <!-- Incentives Input -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-hand-holding-usd"></i> </span> </div>
                    <input type="number" name="incentives" class="form-control" placeholder="@lang('salaries.incentives')"
                        value="{{ $row->incentives ?? '' }}">
                </div>
                <span id="incentives_error" class="red error"></span>
            </div>
        </div>

        <div class="col-md-6">
            {{-- Abscence Input --}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-times"></i> </span> </div>
                    <input type="text" name="absence" class="form-control" placeholder="@lang('absences.absence')"
                        value="{{ $row->salary ?? '' }}">
                </div>
                <span id="absence_error" class="red error"></span>
            </div>

            <!-- Deduction Input -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-percent"></i> </span>
                    </div>
                    <input type="number" name="deduction" class="form-control" placeholder="@lang('salaries.deduction')"
                        value="{{ $row->deduction ?? '' }}">
                </div>
                <span id="deduction_error" class="red error"></span>
            </div>

            <!-- Rate Input -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-dollar-sign"></i> </span>
                    </div>
                    <input type="number" name="rate" class="form-control" placeholder="@lang('salaries.rate')" autocomplete>
                </div>
                <span id="rate_error" class="red error"></span>
            </div>
        </div>

        <div class="col-md-12">
            <!--  note Input -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-quote-right"></i> </span>
                    </div>
                    <textarea name="note" class="form-control" placeholder="@lang('salaries.note')" autocomplete></textarea>
                </div>
                <span id="note_error" class="red error"></span>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ path('custom/js/test.js') }}"></script>
@endpush
