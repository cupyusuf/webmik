<?php

namespace App\Controllers;

use App\Services\ContentService;

class Manga extends \App\Controllers\BaseController
{
    public function index(): string
    {
        $service = new ContentService();

        return view('manga/index', $service->mangaPage());
    }
}
