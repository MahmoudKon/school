<div>
    <div id="member-card" class="card bg-gradient-striped-yellow box-shadow-0 mb-0"
        style="border: 1px solid yellow; padding: 0 10px; width: 400px;">
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-fluid" src="{{ $user->image_path }}" width="100%" />
                    </div>

                    <div class="col-md-7">
                        <p class="card-text"> {{ $user->personal_id }} </p>
                        <p class="card-text"> {{ $user->username }} </p>
                        <p class="card-text"> {{ $user->code }} </p>
                        <p class="card-text"> {{ $user->created_at }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="member-card" class="btn btn-primary d-block print">
    <i class=" fa fa-print"></i> @lang('general.print')
</a>
