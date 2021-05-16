<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header ">
            <ul class="nav navbar-nav flex-row">
                <!-- BEGIN ICON FOR MOBILE -->
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0)">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <!-- END ICON FOR MOBILE -->

                <!-- BEGIN FOR LOGO LINK -->
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('dashboard.home') }}">
                        <img class="brand-logo" alt="modern admin logo"
                            src="{{ asset('assets/dashboard/images/logo/logo.png') }}">
                        <h3 class="brand-text">@lang('general.logo')</h3>
                    </a>
                </li>
                <!-- BEGIN FOR LOGO LINK -->

                <!-- BEGIN ICON FOR PHONE SCREEN WIDTH -->
                <li class="nav-item d-md-none">
                    <button class="btn bg-transparent nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile">
                        <i class="la la-ellipsis-v"></i>
                    </button>
                </li>
                <!-- END ICON FOR PHONE SCREEN WIDTH -->
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <!-- BEGIN ICON FOR MENU -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0)">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                    <!-- BEGIN ICON FOR MENU -->

                    <!-- BEGIN ICON FOR FULL WIDTH WINDOW -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="javascript:void(0)">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li>
                    <!-- BEGIN ICON FOR FULL WIDTH WINDOW -->
                </ul>

                <ul class="nav navbar-nav float-right">
                    <!-- BEGIN SELECT THE LANGUAGES -->
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0)"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentFlagName() }}"></i>
                            <span class="selected-language"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ App::getLocale() !== $localeCode ? LaravelLocalization::getLocalizedURL($localeCode, null, [], true) : 'javascript::void(0)' }}">
                                    <i class="flag-icon flag-icon-{{ $properties['flag'] }}"></i>
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <!-- END SELECT THE LANGUAGES -->

                    <!-- BEGIN USER LINKS -->
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link pt-1" href="javascript:void(0)"
                            data-toggle="dropdown" style="line-height: 31px !important;">
                            <span class="mr-1">@lang('general.hello'),
                                <span class="user-name text-bold-700">{{ auth()->user()->username }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ auth()->user()->image_path }}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item load-form"
                                href="{{ route('dashboard.users.edit', auth()->user()->id) }}">
                                <i class="ft-user"></i> Edit Profile
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ft-mail"></i> My Inbox</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ft-check-square"></i> Task</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ft-message-square"></i>
                                Chats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item danger" href="javascript:void(0)"
                                onclick="document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> @lang('auth.logout')
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- END USER LINKS -->
                </ul>
            </div>
        </div>
    </div>
</nav>
