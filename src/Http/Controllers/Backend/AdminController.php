<?php

namespace Yasha\Backend\Http\Controllers\Backend;

use Backpack\Base\app\Http\Controllers\AdminController as BackpackAdminController;

class AdminController extends BackpackAdminController
{
    /**
     * This is overriding admin dashboard from backpack.
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title

        return view('backpack::dashboard', $this->data);
    }

    public function server()
    {

        ob_start();
        phpinfo();

        preg_match('%<style type="text/css">(.*?)</style>.*?(<body>.*</body>)%s', ob_get_clean(), $matches);

        # $matches [1]; # style information
        # $matches [2]; # body information

        $styles = join("\n", array_map(
            function ($i) {
                return ".phpinfodisplay " . preg_replace("/,/", ",.phpinfodisplay ", $i);
            },
            preg_split('/\n/', $matches[1])));


        $this->data['content'] = "
        <div> Backend " . $_SERVER['YASHABASE_BACKEND_VERSION'] . "</div>
        <hr>
        <div> Backpack Crud " . $_SERVER['BACKPACK_CRUD_VERSION'] ."</div>
        <hr>
        <div> Backpack Base " . $_SERVER['BACKPACK_BASE_VERSION'] ."</div>
        <hr>
        <div> Laravel " . app()::VERSION ."</div>
        <hr>
        <div class='phpinfodisplay'>
        <style type='text/css'>\n" . $styles . "</style>\n" . $matches[2] . "\n</div>\n";

        return view('yasha-backend::content', $this->data);
    }
}
