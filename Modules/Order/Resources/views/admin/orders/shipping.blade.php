@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.show', ['resource' => trans('order::orders.order')]))
@endcomponent

@section('content')
@endsection
