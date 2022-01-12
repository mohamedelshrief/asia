@php
use \Modules\Setting\Entities\Country;
@endphp
<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('emirates_post_enabled', trans('setting::attributes.emirates_post_enabled'), trans('setting::settings.form.enable_emirates_post'), $errors, $settings) }}
        {{ Form::text('emirates_post_label', trans('setting::attributes.translatable.emirates_post_label'), $errors, $settings, ['required' => true]) }}



        <div class="form-group">
            <label class="col-md-3 control-label text-left">{{trans('setting::attributes.translatable.emirates_post_country')}}<span class="m-l-5 text-red">*</span></label>
            <div class="col-md-9">
                <select class="form-contol" name="emirates_country" id="emirates_country" required="true" >
                    <option >{{trans('setting::attributes.translatable.emirates_post_country')}}</option>
                    @foreach (Country::get() as $item)
                    @if ($settings["emirates_country"]==$item->country_id)
                        <option value="{{$item->country_id}}" selected >{{$item->country_name}}</option>
                    @else
                        <option value="{{$item->country_id}}">{{$item->country_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
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
