<?php

namespace Yasha\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Yasha\Backend\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public $data = [];

    public function __construct(){

        //parent::__construct();

    }

    public function index()
    {
        if (!$page = Page::where('id', \Setting::get('homepage'))->first())
        {
            // if homepage is not overriden load the default
            return view('pages.home_layout');
        }

        return $this->load_page($page);
    }

    public function backend($slug, $subs = null)
    {
        if (!$page = Page::where('slug->'. app()->getLocale() , $slug)->firstOrFail())
        {
            // if no slug has been found show erro page
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        return $this->load_page($page);
    }

    private function load_page($page)
    {

        $this->data['page'] = $page->withFakes();
        
        $this->data['meta']['title'] = $page->meta_title; 
        $this->data['meta']['description'] = $page->meta_description; 
        $this->data['meta']['keywords'] = $page->meta_keywords; 
 
        return view('pages.'.$page->template, $this->data);
    }
}
