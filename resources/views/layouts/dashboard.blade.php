<!-- BEGIN HEADER -->
@include('includes.dashboard._header')
<!-- END HEADER -->

<!-- BEGIN NAVBAR -->
@include('includes.dashboard._navbar')
<!-- END NAVBAR -->

<!-- BEGIN SIDEBAR -->
@include('includes.dashboard._sidebar')
<!-- END SIDEBAR -->

<!-- BEGIN CONTENT -->
<div class="app-content content">
    <div class="content-wrapper">
        <!-- BEGIN MENU -->
        @include('includes.dashboard._menu')
        <!-- END MENU -->

        <!-- BEGIN PAGES -->
        <div class="content-body">
            @yield('content')
        </div>
        <!-- END PAGES -->
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN MODAL -->
@include('includes.dashboard._modal')
<!-- END MODAL -->

<!-- BEGIN FOOTER -->
@include('includes.dashboard._footer')
<!-- END FOOTER -->
