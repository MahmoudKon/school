<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- BEGIN DASHBOARD HOME LINK -->
            <li
                class="nav-item {{ (Request::segment(1) === App::getLocale() && Request::segment(3) === null) || (Request::segment(1) === 'dashboard' && Request::segment(2) === null) ? 'active open' : '' }}">
                <a href="{{ route('dashboard.home') }}">
                    <i class="fa fa-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        @lang('general.dashboard')
                    </span>
                </a>
            </li>
            <!-- END DASHBOARD HOME LINK -->

            <!-- BEGIN ROLES LINK -->
            <li class="nav-item {{ active('roles') }}">
                <a href="{{ route('dashboard.roles.index') }}">
                    <i class="fa fa-tags"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.roles')</span>
                </a>
            </li>
            <!-- END ROLES LINK -->

            <!-- BEGIN PERMISSIONS LINK -->
            <li class="nav-item {{ active('permissions') }}">
                <a href="{{ route('dashboard.permissions.index') }}">
                    <i class="fa fa-hashtag"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.permissions')</span>
                </a>
            </li>
            <!-- END PERMISSIONS LINK -->

            <!-- BEGIN LOGS LINK -->
            <li class="nav-item {{ active('logs') }}">
                <a href="{{ route('dashboard.logs.index') }}">
                    <i class="fa fa-eye"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.logs')</span>
                </a>
            </li>
            <!-- END LOGS LINK -->

            <!-- BEGIN MANAGMENT LINK -->
            <li class="navigation-header hover text-right">
                <span data-i18n="nav.category.support" class="bg-info white"
                    style="padding: 5px">@lang('general.managment')</span><i class="la la-ellipsis-h ft-minus"
                    data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
                <hr>
            </li>
            <!-- END MANAGMENT LINK -->

            <!-- BEGIN USERS LINK -->
            <li class="nav-item {{ active('users') }}">
                <a href="{{ route('dashboard.users.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.users')</span>
                </a>
            </li>
            <!-- END USERS LINK -->


            <!-- BEGIN ABSENCES LINK -->
            <li class="nav-item {{ active('absences') }}">
                <a href="{{ route('dashboard.absences.index') }}">
                    <i class="fa fa-business-time"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.absences')</span>
                </a>
            </li>
            <!-- END ABSENCES LINK -->

            <!-- BEGIN SALARIES LINK -->
            <li class="nav-item {{ active('salaries') }}">
                <a href="{{ route('dashboard.salaries.index') }}">
                    <i class="fa fa-dollar-sign"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.salaries')</span>
                </a>
            </li>
            <!-- END SALARIES LINK -->

            <!-- BEGIN CLASSES LINK -->
            <li class="nav-item {{ active('rows') }}">
                <a href="{{ route('dashboard.rows.index') }}">
                    <i class="fa fa-school"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.rows')</span>
                </a>
            </li>
            <!-- END CLASSES LINK -->

            <!-- BEGIN SUBJECTS LINK -->
            <li class="nav-item {{ active('subjects') }}">
                <a href="{{ route('dashboard.subjects.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.subjects')</span>
                </a>
            </li>
            <!-- END SUBJECTS LINK -->

            <!-- BEGIN EXAMS LINK -->
            <li class="nav-item {{ active('exams') }}">
                <a href="{{ route('dashboard.exams.index') }}">
                    <i class="fa fa-diagnoses"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.exams')</span>
                </a>
            </li>
            <!-- END EXAMS LINK -->

            <!-- BEGIN QUESTIONS LINK -->
            <li class="nav-item {{ active('questions') }}">
                <a href="{{ route('dashboard.questions.index') }}">
                    <i class="fa fa-question"></i>
                    <span class="menu-title" data-i18n="nav.invoice.main">@lang('general.questions')</span>
                </a>
            </li>
            <!-- END QUESTIONS LINK -->
        </ul>
    </div>
</div>
