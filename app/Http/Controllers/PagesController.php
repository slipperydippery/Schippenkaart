<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function home ()
    {
        return view('ships.show');
    }

    public function about ()
    {
        return view('about');
    }

    public function contact ()
    {
        return view('contact');
    }

    public function item ()
    {
        $item = 'blueberry pi';
        return view('item')->with('item', $item);
    }

}