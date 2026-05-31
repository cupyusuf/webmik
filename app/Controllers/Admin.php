<?php

namespace App\Controllers;

use App\Services\ContentService;

class Admin extends \App\Controllers\BaseController
{
    public function index()
    {
        $service = new ContentService();
        $data = $service->dashboard();

        return view('admin/dashboard', $data);
    }
}
