<div class="row">
    {{-- <input type="hidden" name='id' value="{{ $question->id ?? '' }}"> --}}
    <input type="hidden" name='exam_id' value="{{ $exam->id ?? '' }}">
    <div class="col-md-10">
        {{-- Input To Display The Question --}}
        <div class="form-group">
            <label> @lang('questions.question') </label>
            <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-question"></i> </span>
                </div>
                <input type="text" class="form-control" name='question' placeholder="@lang('questions.question')"
                    value="{{ $question->question ?? '' }}">
            </div>
            <span id="question_error" class="red error"></span>
        </div>

        {{-- Input To Display The Answers --}}
        <div class="form-group">
            <label> @lang('questions.answers') </label>
            <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-check"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name='answers' placeholder="@lang('questions.answers')"
                    value="{{  $question->answers ?? '' }}">
            <span id="answers_error" class="red error"></span>
        </div>

        <div class="row">
            <div class="col-md-8">
                {{-- Input To Display The Correct Answer --}}
                <div class="form-group">
                    <label> @lang('questions.correct') </label>
                    <div class="input-group">
                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name='correct' placeholder="@lang('questions.correct')"
                            value="{{ $question->correct ?? '' }}">
                    </div>
                    <span id="correct_error" class="red error"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-danger" data-repeater-delete> <i class="ft-x"></i>
                Delete</button>
        </div>
    </div>

    <div class="col-md-2">
        {{-- Input To Display The Attach --}}
        <div class="form-group">
            <div id="image">
                <input type="hidden" name="attach" value="{{ $question->attach ?? '' }}">
                <input type="file" name="attach" class="form-control image" placeholder="@lang('questions.attach')" value="{{ $question->attach ?? '' }}">
                <img src="{{ $question->attach_path ?? asset('uploads/default/default.png') }}"
                    class="img-border img-thumbnail">
            </div>
            <span id="attach_error" class="red error"></span>
        </div>
    </div>
    <hr>
</div>
