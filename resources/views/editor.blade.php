@include("admin::form._header")

        <style>
            .cke_editor_column, .cke_editor_body{
                border-radius:0.25rem;
                overflow:hidden;
                border-color:#ced4da;
            }
            .cke_focus{
                border-color:#9dcbff;
                box-shadow:0 0 0 .25rem rgba(58,150,255,.25);
            }
        </style>
        <textarea name="{{$name}}" rows="{{ $rows }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {!! $attributes !!} >
            {{ old($column, $value) }}
        </textarea>

@include("admin::form._footer")