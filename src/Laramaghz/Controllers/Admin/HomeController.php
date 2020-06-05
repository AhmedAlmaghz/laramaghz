<?php

namespace Almaghz\Laramaghz\Laramaghz\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
       return view('laramaghz::admin.home.index');
    }
}
