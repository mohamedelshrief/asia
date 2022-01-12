@php
use \Modules\Setting\Entities\Country;
@endphp
<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('emirates_post_enabled', trans('setting::attributes.emirates_post_enabled'), trans('setting::settings.form.enable_emirates_post'), $errors, $settings) }}
        {{ Form::text('emirates_post_label', trans('setting::attributes.translatable.emirates_post_label'), $errors, $settings, ['required' => true]) }}

    </div>
</div>


@push('scripts')
<script>
    $("#emirates_country").change(function() {
        country=$("#emirates_country").val();
        $.ajax({
            url: "{{url('en/api/cities/')}}"+country,
            type: "GET",
            async: false,
            success: function (reponse) {
                console.log(reponse);
                alert(reponse)
            },
        });
    });
</script>
@endpush
