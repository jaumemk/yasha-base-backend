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
        $page = Page::where('id', \Setting::get('homepage'))->first();

        if (!$page)
        {
            return view('pages.home_layout');
        }

        $this->data['page'] = $page->withFakes();
        $this->data['page_title'] = $page->title;
        $this->data['page_content'] = $page->content;

        return view('pages.'.$page->template, $this->data);
    }

    public function backend($slug, $subs = null)
    {
        $page = Page::where('slug->'. app()->getLocale() , $slug)->firstOrFail();

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['page'] = $page->withFakes();
        $this->data['page_title'] = $page->title;
        $this->data['page_content'] = $page->content;

        return view('pages.'.$page->template, $this->data);
    }
}
