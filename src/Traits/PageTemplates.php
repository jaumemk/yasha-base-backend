<?php

namespace Yasha\Backend\Traits;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */

    private function main_layout()
    {

        $this->crud->addField([
            'name' => 'content',
            'label' => __('yasha/backend::pagemanager.content'),
            'type' => 'wysiwyg',
            'placeholder' => __('yasha/backend::pagemanager.content_placeholder'),
            'tab' => 'Contents'
        ]);

        $this->crud->addField([
            'name' => 'meta_title',
            'label' => __('yasha/backend::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => 'SEO Tools'
        ]);

        $this->crud->addField([
            'name' => 'meta_description',
            'label' => __('yasha/backend::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => 'SEO Tools'
        ]);

        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => __('yasha/backend::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => 'SEO Tools'
        ]);

    }
}