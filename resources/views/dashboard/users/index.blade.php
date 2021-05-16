@extends('layouts.dashboard')

@section('sub_menu')
    <li class="breadcrumb-item active"> <i class="fa fa-users"></i> @lang('general.' . getModel()) </li>
@endsection

@section('content')

    <div class="card">
        @php $options = []; @endphp
        @include('dashboard.includes.card._header')
        <div class="card-body">
            @include('dashboard.includes.card._body')
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th class="remove-when-print"> <input type="checkbox" id="check-all"> </th>
                            <th> @lang('general.image') </th>
                            <th data-sort='username'> @lang(getModel() . '.username') </th>
                            <th data-sort='full_name'> @lang(getModel() . '.full_name') </th>
                            <th data-sort='email'> @lang(getModel() . '.email') </th>
                            <th data-sort='phone'> @lang(getModel() . '.phone') </th>
                            <th> @lang(getModel() . '.code') </th>
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
