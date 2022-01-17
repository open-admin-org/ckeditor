<?php

namespace OpenAdmin\Admin\CKEditor;

use OpenAdmin\Admin\Form\Field\Textarea;

class Editor extends Textarea
{
    protected $view = 'open-admin-ckeditor::editor';

    protected static $js = [
        'vendor/open-admin-ext/ckeditor/ckeditor.js',
    ];

    public function setupImageBrowse()
    {
        $this->options['filebrowserBrowseUrl'] = '/admin/media/?select=true&fn=window.opener.'.$this->id.'_selectFile';
        $this->options['filebrowserImageBrowseUrl'] = '/admin/media?select=true&fn=window.opener.'.$this->id.'_selectFile';
    }

    public function render()
    {
        $config = (array) CKEditor::config('config');
        $this->setupImageBrowse();

        $config = json_encode(array_merge($config, $this->options));

        $this->script = <<<EOT
function {$this->id}_selectFile(url,file_name)
{
    var dialog = CKEDITOR.dialog.getCurrent();
    dialogName = dialog.getName();

    if ( dialogName == 'link' ) {

        dialog.getContentElement('info', 'url').setValue(url);
        linkDisplayText = dialog.getContentElement('info', 'linkDisplayText')
        if (linkDisplayText.getValue() == ""){
            linkDisplayText.setValue(file_name);
        }

    }else{

        // dialogName == image
        dialog.selectPage('info');
        dialog.getContentElement('info', 'txtUrl').setValue(url);
        dialog.getContentElement('info', 'txtAlt').setValue(file_name);
    }
}
window.{$this->id}_selectFile = {$this->id}_selectFile; // make it globaly available

CKEDITOR.replace('{$this->id}', $config);
EOT;
        return parent::render();
    }
}
