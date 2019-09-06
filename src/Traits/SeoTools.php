<?php

namespace Yasha\Backend\Traits;

trait SeoTools
{
    private function seo_tools()
    {
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => __('yasha/backend::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras_translatable',
            'tab' => 'SEO Tools'
        ]);

        $this->crud->addField([
            'name' => 'meta_description',
            'label' => __('yasha/backend::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras_translatable',
            'tab' => 'SEO Tools'
        ]);

        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => __('yasha/backend::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras_translatable',
            'tab' => 'SEO Tools'
        ]);

    }
}