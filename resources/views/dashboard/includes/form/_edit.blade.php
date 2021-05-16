<div class="card m-0">
    <div class="card-header bg-primary white mb-1 p-1">
        <h4 class="card-title white" id=""><i class="fa fa-pen"></i> @lang(getModel() . '.update_data')</h4>
    </div>

    <div id="message"></div>
    <form class="form" action="{{ route('dashboard.' . getModel() . '.update', $row) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}

        <input type="hidden" name="id" value="{{ $row->id }}">
        <span id="id_error" class="red error"></span>

        @include('dashboard.' . getModel() . '._form')

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary d-block w-100"><i class="fa fa-pen"></i>
                @lang('general.update')</button>
        </div>

    </form><!-- end of form -->
</div>
