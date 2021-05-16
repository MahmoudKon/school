<div class="alert round bg-success alert-icon-left {{ App::getLocale() === 'ar' ? 'alert-arrow-left' : '' }} alert-dismissible mb-0"
    role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
    {{ Session::get('username') }}
</div>
