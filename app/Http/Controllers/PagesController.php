<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function forum() {
        return view('pages.forum');
    }

    public function services() {
        return view('pages.services');
    }
}
