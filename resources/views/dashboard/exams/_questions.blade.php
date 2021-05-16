<link rel="stylesheet" type="text/css" href="{{ path('vendors/css/forms/tags/tagging.css') }}">
<div class="card-body" style="width: 700px">
    <div class="card mb-0">
        <div class="card-header bg-primary white mb-1 p-1">
            <h4 class="card-title white" id=""><i class="fa fa-plus"></i> @lang(getModel() . '.create_data')</h4>
        </div>

        <div id="message"></div>
        <form class="form" action="{{ route('dashboard.questions.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('post') }}
            <input type="hidden" name='exam_id' value="{{ $exam->id ?? '' }}">

            <div class="repeater-default">
                <div data-repeater-list="questions">
                    @if (isset($exam) && $exam->questions->count() > 0)
                        @foreach ($exam->questions as $question)
                            <div data-repeater-item>
                                @include('dashboard.questions._form')
                            </div>
                        @endforeach
                    @else
                        <div data-repeater-item>
                            @include('dashboard.questions._form')
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <button type="button" data-repeater-create class="btn btn-primary btn-black mb-2 w-100">
                    <i class="ft-plus"></i> Add
                </button>
            </div>

            <div class="form-group d-flex justify-content-between mb-0">
                <button type="submit" class="btn btn-primary" style="width: 49.5%;">
                    <i class="ft-plus" style="margin: 0 5px;"></i>
                    @lang('general.create')
                </button>
                <button type="reset" class="btn btn-warning" style="width: 49.5%;">
                    <i class="ft-refresh-cw position-right" style="margin: 0 5px;"></i>
                    @lang('general.reset')
                </button>
            </div>

        </form><!-- end of form -->
    </div>

</div>
<script type="text/javascript" src="{{ path('vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/forms/form-repeater.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/forms/tags/tagging.min.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/forms/tags/tagging.js') }}"></script>
