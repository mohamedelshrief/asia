@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', __('Notifications'))

    <li class="active">{{ __('Notifications') }}</li>
@endcomponent



@component('admin::components.page.index_table')
    @slot('resource', 'notification')
    @slot('name', __('notification'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('admin::admin.table.status') }}</th>
            <th data-sort>{{ __('Notified at') }}</th>
        </tr>
    @endslot
@endcomponent

@push('scripts')
    <script>
        new DataTable('#notification-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id',   },
                { data: 'name', name: 'notification_text', orderable: false, defaultContent: '' },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
