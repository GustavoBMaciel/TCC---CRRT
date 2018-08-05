<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
      return view('site.home.index');
    }

    public function contato()
    {
      return view('site.home.contato');
    }
    public function sobre()
    {
      return view('site.home.sobre');
    }
}
