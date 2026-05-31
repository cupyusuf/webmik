<?php

namespace App\Controllers;

use App\Services\ContentService;

class Home extends \App\Controllers\BaseController
{
    public function index(): string
    {
        $service = new ContentService();

        return view('home', $service->landing());
    }

    public function checkout(): string
    {
        return view('checkout_snap');
    }
}
