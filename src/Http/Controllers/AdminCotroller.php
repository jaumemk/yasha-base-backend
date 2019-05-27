<?php

namespace Yasha\Backend\Http\Controllers;

use Backpack\Base\app\Http\Controllers\AdminController as BackpackAdminController;

class AdminController extends BackpackAdminController
{
    /**
     * This is overriding admin dashboard from backpack.
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title

        return view('yasha/backend::dashboard', $this->data);
    }
}
