@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', __('Notifications'))

    <li class="active">{{ __('Notifications') }}</li>
@endcomponent



@component('admin::components.page.header')

@endcomponent

@push('scripts')
@endpush
