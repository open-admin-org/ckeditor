@include("admin::form._header")

        <style>
            .cke_editor_column{
                border-radius:0.25rem;
                overflow:hidden;
            }
        </style>
        <textarea name="{{$name}}" rows="{{ $rows }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {!! $attributes !!} >
            {{ old($column, $value) }}
        </textarea>

@include("admin::form._footer")