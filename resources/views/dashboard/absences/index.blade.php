@extends('layouts.dashboard')

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-business-time"></i> @lang('general.' . getModel()) </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                @php $options = ['create', 'print', 'import', 'export']; @endphp
                @include('dashboard.includes.card._header')
                <div class="card-body">
                    @include('dashboard.includes.card._body')
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th class="remove-when-print"> <input type="checkbox" id="check-all"> </th>
                                    <th> @lang('users.username') </th>
                                    <th> @lang('absences.day') </th>
                                    <th> @lang('absences.month') </th>
                                    <th data-sort='created_at' data-order='desc'> @lang('general.created_at') </th>
                                    <th> @lang('absences.Tpresence') </th>
                                    <th> @lang('absences.Tback') </th>
                                    <th> @lang('absences.status') </th>
                                    <th> @lang('absences.note') </th>
                                    <th class="remove-when-print"> @lang('general.action') </th>
                                </tr>
                            </thead>
                            <tbody id="load_data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- START FORM --}}
        <div class="col-md-4">
            <div style="position: fixed; width: 25%">
                {{-- Form Create Blade --}}
                @include('dashboard.includes.form._create')
            </div>
        </div>
        {{-- END FORM --}}
    </div>
@endsection

@push('script')
    <script src="{{ path('custom/js/test.js') }}"></script>
@endpush
