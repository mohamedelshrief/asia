<div class="row">
    <div class="col-md-8">
        {{ Form::text('name', trans('brand::attributes.name'), $errors, $brand, ['required' => true]) }}
        {{ Form::checkbox('is_active', trans('brand::attributes.is_active'), trans('brand::brands.form.enable_the_brand'), $errors, $brand) }}
        {{ Form::text('sort_id', trans('brand::attributes.sort_id'), $errors, $brand, ['required' => true]) }}
    </div>
</div>
