<!-- select -->
<div @include('crud::inc.field_wrapper_attributes')>
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <select name="{{ $field['name'] }}" @include('crud::inc.field_attributes')>
        <option value="">-</option>
        @foreach ($field['model']::all() as $v)

        @if($entry->value == $v->{$field['set']})
            <option value="{{ $v->{$field['set']} }}" selected>{{ $v->{$field['show']} }}</option>
        @else
            <option value="{{ $v->{$field['set']} }}">{{ $v->{$field['show']} }}</option>
        @endif

        @endforeach
    </select>
    {{-- HINT --}}
    @if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>
