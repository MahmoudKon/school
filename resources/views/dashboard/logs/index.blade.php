@extends('layouts.dashboard')

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-business-time"></i> @lang('general.' . getModel()) </li>
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
                            <th> @lang('logs.username') </th>
                            <th> @lang('logs.message') </th>
                            <th> @lang('logs.url') </th>
                            <th> @lang('logs.page') </th>
                            <th> @lang('logs.method') </th>
                            <th> @lang('logs.controller') </th>
                            <th> @lang('logs.model') </th>
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
