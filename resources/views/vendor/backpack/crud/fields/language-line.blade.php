<!-- textarea -->
<div @include('crud::inc.field_wrapper_attributes')>
    @include('crud::inc.field_translatable_icon')
    @foreach (LaravelLocalization::getLocalesOrder() as $key => $locale)
    <div class="row lang-line">
        <div class="col-xs-3">
            <label class="text-capitalize">{!! $locale['native'] !!}</label>
        </div>
        <div class="col-xs-9">
            <textarea type="text" name="{{ $field['name'] }}[{{$key}}]" @include('crud::inc.field_attributes')>{{ old($field['name']) ?? $field['value'][$key] ?? $field['default'] ?? '' }}</textarea>
        </div>
    </div>
    @endforeach
    {{-- HINT --}}
    @if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>
