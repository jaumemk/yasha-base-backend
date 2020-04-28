<?php

namespace Yasha\Backend\Http\Controllers\Backend;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request as StoreRequest;
use Illuminate\Http\Request as UpdateRequest;

class MenuItemController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Yasha\Backend\Models\MenuItem");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/menu-item');
        $this->crud->setEntityNameStrings(__('yasha/backend::basic.menu-item'), __('yasha/backend::basic.menu-items'));

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 0);

        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "Yasha\Backend\Models\MenuItem",
                            ]);

        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addField([
                                'label' => 'Parent',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "Yasha\Backend\Models\MenuItem",
                            ]);
        $this->crud->addField([
                                'name' => 'type',
                                'label' => 'Type',
                                'type' => 'page_or_link',
                                'page_model' => 'Yasha\Backend\Models\Page',
                            ]);
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