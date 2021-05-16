<div style="width: 400px;">
    <div class="alert alert-blue-grey mb-0" role="alert">
        <span class="white">@lang('general.select_excel_file')</span>
    </div>
    <form class="form" action="{{ route('dashboard.' . getModel() . '.import') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-file-excel"></i> </span>
            </div>
            <input type="file" name="file" class="form-control">
            <div class="input-group-prepend">
                <button type="submit" class="btn btn-primary bg-primary border-primary">
                    <i class="fa fa-upload"></i>
                </button>
            </div>
        </div>
        <span id="file_error" class="red error"></span>
    </form>
    <div id="message"></div>
</div>
