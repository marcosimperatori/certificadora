<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Escritorio extends BaseController
{
    public function index()
    {
        return view('escritorio/index');
    }
}
