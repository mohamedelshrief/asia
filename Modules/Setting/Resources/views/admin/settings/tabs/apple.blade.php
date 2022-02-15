<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('apple_login_enabled', trans('setting::attributes.apple_login_enabled'), trans('setting::settings.form.enable_apple_login'), $errors, $settings) }}

    </div>
</div>
