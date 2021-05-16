<div class="card mb-0">
    <div class="card-header bg-primary white mb-1 p-1">
        <h4 class="card-title white" id=""><i class="fa fa-plus"></i> @lang(getModel() . '.create_data')</h4>
    </div>

    <div id="message"></div>
    <form class="form" action="{{ route('dashboard.' . getModel() . '.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        {{ method_field('post') }}

        @include('dashboard.'. getModel() .'._form')

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
