<?php

namespace Yasha\Backend\Http\Controllers\Backend;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request as StoreRequest;
use Illuminate\Http\Request as UpdateRequest;

class LanguageLineController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Yasha\Backend\Models\LanguageLine");
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/lang-line');
        $this->crud->setEntityNameStrings(__('yasha/backend::basic.lang-line'), __('yasha/backend::basic.lang-lines'));

        $this->crud->addColumn([
            'name' => 'group',
            'label' => 'Group',
        ]);

        $this->crud->addColumn([
            'name' => 'key',
            'label' => 'Key',
        ]);

        $this->crud->addColumn([
            'name' => 'text',
            'label' => 'Text',
            'visibleInTable' => false
        ]);

        $this->crud->addField([
            'name' => 'group',
            'label' => 'Group',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'key',
            'label' => 'Key',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'text',
            'label' => 'Text',
            'type' => 'language-line',
        ]);

        // $this->crud->addField([
        //                         'name' => 'en',
        //                         'label' => 'en',
        //                         'fake' => true,
        //                         'store_in' => 'text'
        //                     ]);
    }

    public function setup()
    {
        $this->crud->orderBy('updated_at', 'desc');
    }

    public function store(StoreRequest $request)
    {

        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
