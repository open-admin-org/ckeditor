@include("admin::form._header")

        <textarea name="{{$name}}" rows="{{ $rows }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {!! $attributes !!} >
            {{ old($column, $value) }}
        </textarea>

@include("admin::form._footer")