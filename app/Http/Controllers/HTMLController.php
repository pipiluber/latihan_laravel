<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HTMLController extends Controller
{
    public function getLorem()
    {
        return view ('v_html.getLorem');
    }
    //
}
