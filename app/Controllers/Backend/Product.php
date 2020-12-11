<?php

namespace App\Controllers\Backend;

use \App\Controllers\BaseController;

class Product extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('backend/product');
    }
}
