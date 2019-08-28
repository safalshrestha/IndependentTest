<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //not required and could be incorporated with the PagesController but just put here
    //handled rendering of the index or welcome page.
    public function index()
    {
        if (request()->ajax())
        {
            $sections = view('welcome')->renderSections();
            return $sections['content'];
        }
        return view('welcome');
    }
}
