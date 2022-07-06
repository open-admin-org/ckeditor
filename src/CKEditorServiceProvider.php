<?php

namespace OpenAdmin\Admin\CKEditor;

use Illuminate\Support\ServiceProvider;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Form;

class CKEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(CKEditor $extension)
    {
        if (!CKEditor::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'open-admin-ckeditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/open-admin-ext/ckeditor')],
                'open-admin-ckeditor'
            );
        }

        Admin::booting(function () {
            Admin::js('vendor/open-admin-ext/ckeditor/ckeditor.js', false); // prevent minifying (last arg)
            Form::extend('ckeditor', Editor::class);
        });
    }
}
