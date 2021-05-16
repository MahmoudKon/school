@extends('layouts.dashboard')

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-dollar-sign"></i> @lang('general.' . getModel()) </li>
@endsection

@section('content')

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
                            <th> @lang('salaries.salary') </th>
                            <th> @lang('salaries.deduction') </th>
                            <th> @lang('salaries.incentives') </th>
                            <th> @lang('salaries.rate') </th>
                            <th> @lang('salaries.note') </th>
                            <th data-sort='created_at' data-order='desc'> @lang('general.created_at') </th>
                            <th class="remove-when-print"> @lang('general.action') </th>
                        </tr>
                    </thead>
                    <tbody id="load_data"></tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script src="{{ path('custom/js/test.js') }}"></script>
@endpush
