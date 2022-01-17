<?php

namespace OpenAdmin\Admin\CKEditor;

use OpenAdmin\Admin\Extension;

class CKEditor extends Extension
{
    public $name = 'ckeditor';

    public $views = __DIR__.'/../resources/views';

    //public $assets = __DIR__.'/../resources/assets';

    public function assets()
    {
        return base_path('vendor/ckeditor/ckeditor');
    }
}
