<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('ngenius_enabled', trans('setting::attributes.ngenius_enabled'), trans('setting::settings.form.enable_ngenius'), $errors, $settings) }}
        {{ Form::text('ngenius_label', trans('setting::attributes.ngenius_label'), $errors, $settings, ['required' => true]) }}
        {{ Form::textarea('ngenius_description', trans('setting::attributes.ngenius_description'), $errors, $settings, ['rows' => 3, 'required' => false]) }}

        <div class="{{ old('ngenius_enabled', array_get($settings, 'ngenius_enabled')) ? '' : 'hide' }}" id="ngenius-fields">
            {{ Form::text('ngenius_outlet_key', trans('setting::attributes.ngenius_outlet_key'), $errors, $settings, ['required' => true]) }}
            {{ Form::text('ngenius_api_key', trans('setting::attributes.ngenius_api_key'), $errors, $settings, ['required' => true]) }}
        </div>
    </div>
</div>


